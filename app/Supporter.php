<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Supporter extends User
{
    protected $table = 'users';

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    

}
