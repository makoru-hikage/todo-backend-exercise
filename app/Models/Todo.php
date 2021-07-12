<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model {
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $fillable = ['is_done', 'priority'];

    protected $hidden = ['deleted_at'];
}