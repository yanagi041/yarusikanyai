<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['user_id', 'title', 'task0', 'task1', 'task2', 'task3', 'task4', 'is_finished'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
