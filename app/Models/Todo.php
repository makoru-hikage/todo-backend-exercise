<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model {
    use SoftDeletes;

    $fillable = ['is_done', 'priority'];

    $hidden = ['deleted_at'];
}