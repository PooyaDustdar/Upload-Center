<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $appends = ["used_size"];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function getUsedSizeAttribute(){
        return $this->Files()->sum("size");
    }
    public function Requests(){
        return $this->hasMany(Request::class);
    }

    public function Files(){
        return $this->hasMany(File::class);
    }

    public function FilesDownloads(){
        return $this->hasManyThrough(Downloads::class,File::class);
    }
}
