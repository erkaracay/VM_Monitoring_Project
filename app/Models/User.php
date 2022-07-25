<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('id', 'like', '%' . request('search') . '%')
            ->orWhere('email', 'like', '%' . request('search') . '%')
            ->orWhere('name', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship With Server
    public function servers() {
        return $this->hasMany(Server::class, 'user_id');
    }
}