<?php namespace App\Repositories;

use App\Illustration;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Contracts\Filesystem\Filesystem;

class IllustrationRepository {

	protected $model;

	public function __construct(Illustration $illustration)
	{
		$this->model = $illustration;
	}

	public function create(UploadedFile $file, Filesystem $cloud)
	{
		$illustration = $this->model->create([
			'path' => '',
			'filesystem' => 0
		]);

		$path = $this->generatePath($file, $illustration);

		$cloud->put($path, file_get_contents($file->getRealPath()));

		$illustration->path = $path;
		$illustration->save();

		return $illustration;
	}

	public function generatePath(UploadedFile $file, $illustration)
	{
		$filename = 'original.'.$file->guessExtension();

		$id = (string) $illustration->id;
		$parts = array(
			substr($id, 0, 2),
			substr($id, 2, 2),
			substr($id, 4)
		);

		$path = "/{$parts[0]}/{$parts[1]}/{$parts[2]}/{$filename}";

		return $path;
	}

	public function find($id)
	{
		return $this->model->find($id);
	}

}