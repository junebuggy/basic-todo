<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersTodo extends Model
{
    /**
     * Get the user that owns the Todo.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
