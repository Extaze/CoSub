<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomMember extends Model
{
    protected $table = 'room_members';

    public function user()
    {
        return User::find($this->user);
    }

    public function room()
    {
        return Room::find($this->room);
    }

    public function rights()
    {
        return RoomRight::find($this->rights);
    }
}