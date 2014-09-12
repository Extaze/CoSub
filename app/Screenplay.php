<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Screenplay extends Model
{
    protected $table = 'screenplays';

    public function room()
    {
        return $this->hasOne('\App\Room', 'screenplay', 'id');
    }
}