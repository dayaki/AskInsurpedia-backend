<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model {
    use HasFactory;

    public function comments() {
        return $this->hasMany('App\Models\Comment', 'question_id');
    }
    
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
