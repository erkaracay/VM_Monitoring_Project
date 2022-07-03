<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'ip',
        'running',
        'availability',
        'user_id',
        'available_on'
    ];

    // Relationship To User
    public function user() {
        return $this->belongsTo(User::class, 'id');
    }
}
