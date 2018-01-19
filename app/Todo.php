<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
    public static $rules = [
      'title' => 'required|max:255',
      'priority' => 'required',
      'status' => 'required',
    ];

    public static $messages = [
        'title.required' => 'Title is Required',
        'title.max' => 'Title no more than 255 words.',
        'priority.required' => 'Priority is required',
        'status.required' => 'Status is required',
    ];

    protected $fillable = [
      'title', 'content', 'priority', 'status', 'due'
    ];
}
