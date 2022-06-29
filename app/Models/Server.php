<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model {
    use HasFactory;

    // Relationship To User
    public function user() {
        return $this->belongsTo(User::class, 'id');
    }
}
