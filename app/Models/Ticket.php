<?php
// app/Models/Ticket.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
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

    public function payment()
    {
        return $this->morphOne(Payment::class, 'payable');
    }

    public function isValid()
    {
        return $this->status === 'paid' && !$this->used_at;
    }
}