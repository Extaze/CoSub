<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomMember extends Model
{
    protected $table = 'room_members';

    public function user()
    {
        return $this->belongsTo('\App\User', 'user', 'id')->get()->first();
    }

    public function room()
    {
        return $this->belongsTo('\App\Room', 'room', 'id')->get()->first();
    }

    public function rights()
    {
        return $this->belongsTo('\App\RoomRight', 'rights', 'id')->get()->first();
    }
}