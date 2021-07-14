<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['course_id','name', 'price','cover_img','start_date','end_date','teacher_id','supporter_id'];

    public function supporter()
    {
        return $this->hasMany('App\Supporter');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function students()
    {
        return $this->belongsToMany(student::class);
    }
}
