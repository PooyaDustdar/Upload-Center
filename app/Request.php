<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        "subject",
        "content",
        "level",
        "user_id",

    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
