<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    // Mass assignable attributes
    protected $fillable = [
        'user_id',
        'message',
        'is_read', // Store as 0 or 1, use accessor/mutator if needed
    ];

    // Optionally, you can define casts to make 'is_read' a boolean
    protected $casts = [
        'is_read' => 'boolean', // Automatically cast 0 to false and 1 to true
    ];

    // Eloquent relationship with User model (assuming notifications belong to a user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Method to mark the notification as read
    public function markAsRead()
    {
        $this->update(['is_read' => 1]); // Set is_read to 1 (true)
    }
}
