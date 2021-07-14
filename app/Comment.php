<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    protected $table ='comments';
    public function course()
    {
        return $this->belongsTo('App\Course','course_id','id');
    }
    public function student()
    {
        return $this->belongsTo('App\Student','student_id','id');
    }
    // public function supporter()
    // {
    //     return $this->belongsTo('App\supporter','supporter_id','id');
    // }

}
