<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model {
    $fillable = ['is_done', 'priority'];

    $hidden = ['deleted_at'];
}