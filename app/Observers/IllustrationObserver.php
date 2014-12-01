<?php namespace App\Observers;

use Illuminate\Contracts\Auth\Authenticatable as User;

class IllustrationObserver {

	protected $user;

	public function __construct(User $user = null)
	{
		$this->user = $user;
	}

	/**
	 * Automatically generates an unique ID and assignes user id if logged in
	 *
	 * @param  Eloquent $model given model
	 * @return bool            all is ok
	 */
	public function creating($model)
	{
		// generating unique ID
		do
		{
			$id = rand(1000000, PHP_INT_MAX);
		}
		while($model->where($model->getKeyName(), $id)->count() > 0);

		// setting the ID
		$model->id = $id;

		// setting the owner id if logged in
		$model->user_id = $this->user ? $this->user->id : null;

		return true;
	}

}