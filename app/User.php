<?php namespace App;

use Hash;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\UserTrait;
use Illuminate\Contracts\Auth\Remindable as RemindableInterface;
use Illuminate\Contracts\Auth\User as UserInterface;
use Illuminate\Database\Eloquent\Model;

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

	protected $fillable = ['username', 'password', 'email', 'language'];

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	public function isInRoom($roomId = null)
	{
		if ($roomId === null) {
			return false;
		}

		if ($this->id === null) {
			return false;
		}

		return (RoomMember::where('room', '=', 1)->where('user', '=', 1)->count() === 1);
	}
}
