<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use Illuminate\Contracts\Filesystem\Cloud as Filesystem;
use App\Repositories\IllustrationRepository;
use App;

class UploadController extends Controller {

	public function __construct(IllustrationRepository $repository)
	{
		$this->repository = $repository;
	}

	public function index()
	{
		return view('upload.form');
	}

	public function upload(UploadRequest $form, Filesystem $filesystem)
	{
		$illustration = $this->repository->create($form->file('illustration'), $filesystem);

		return redirect()->route('illustrations.show', array('id' => $illustration->id));
	}

	public function show($id)
	{
		$illustration = $this->repository->find($id);

		if(!$illustration)
		{
			App::abort(404);
		}

		return view('upload.show')->with('illustration', $illustration);
	}

}