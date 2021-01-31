<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model {
    use HasFactory;

    protected $casts = [
        'consultant' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
