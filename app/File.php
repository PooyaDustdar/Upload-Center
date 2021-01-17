<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'name',
        'size',
        'mime_type',
        'new_name',
        'IDuser',
        'IPuser'
    ];

    public function Users()
    {
        return $this->belongsToMany('App\User');
    }
    public function Downloads()
    {
        return $this->hasMany(Downloads::class);
    }
}
