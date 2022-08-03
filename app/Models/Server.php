<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Server extends Model {
    use HasFactory, Sortable;

    protected $fillable = [
        'name',
        'ip',
        'running', // 0 = not running, 1 = running
        'availability', // 0 = claimed, 1 = available
        'user_id',
        'available_on'
    ];

    public $sortable = ['id', 'user_id', 'running', 'ip', 'name', 'availability', 'available_on'];

    // Relationship To User
    public function user() {
        return $this->belongsTo(User::class, 'id');
    }

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('id', 'like', '%' . request('search') . '%')
            ->orWhere('ip', 'like', '%' . request('search') . '%')
            ->orWhere('name', 'like', '%' . request('search') . '%');
        }
    }
}
