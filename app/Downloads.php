<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Downloads extends Model
{
    protected $fillable = ['ip','id_file','user','token'];
    public function File()
    {
        return $this->belongsTo('App\File');
    }
    public function Users()
    {
        return $this->belongsToMany('App\User');
    }
}
