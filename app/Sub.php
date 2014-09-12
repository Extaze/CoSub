<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    protected $table = 'subs';

    public function room()
    {
        return $this->belongsTo('\App\Room', 'room', 'id')->get()->first();
    }
}

