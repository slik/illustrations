<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Observers\IllustrationObserver;
use App;

class Illustration extends Model {

	public $incrementing = false;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'illustrations';

	/**
	 * List of fields available for mass assigning
	 *
	 * @var array
	 */
	protected $fillable = [
		'path', 'filesystem'
	];

	/**
	 * This method automatically calls to boot the model
	 */
	public static function boot()
	{
		parent::boot();

		$auth = App::make('Illuminate\Contracts\Auth\Guard');

		// setting up the observers
		self::observe(new IllustrationObserver($auth->user()));
	}

	public function publicPath()
	{
		return url('illustrations'.$this->path);
	}

}