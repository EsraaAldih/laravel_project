<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'name', 'start_date', 'end_date','cover_img' ,'teacher_id' , 'supporter_id'
    ];
    
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
        return $this->hasMany('App\Comment');
    }
    
    public function student()
    {
        return $this->belongsToMany('App\Course','student_course','course_id','student_id');
    }
    public function user()
    {
        return $this->belongsTo(App\User::class);
    }
}
