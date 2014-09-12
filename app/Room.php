<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    public function screenplay()
    {
        return $this->belongsTo('\App\Screenplay', 'id', 'screenplay');
    }
}