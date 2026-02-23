<?php
// app/Models/Ticket.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'phone',
        'price',
        'status',
        'payment_id',
        'used_at'
    ];

    protected $casts = [
        'used_at' => 'datetime',
        'price' => 'decimal:2'
    ];

    /**
     * Связь с пользователем
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}