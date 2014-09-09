<?php namespace App;

use Illuminate\Auth\UserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Contracts\Auth\User as UserInterface;
use Illuminate\Contracts\Auth\Remindable as RemindableInterface;

class User extends Model implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	protected $fillable = array('username', 'password', 'email', 'language');

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = \Hash::make($password);
	}
}
