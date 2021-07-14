<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends User
{
    protected $fillable = [
        'name', 'price', 'cover_img','start_date','end_date'
    ];

    protected $table = 'users';

    public function supporter()
    {
        return $this->hasMany('App\Supporter');
    }

    public function course()
    {
        return $this->hasMany('App\Course');
    }
}
