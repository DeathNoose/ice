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

    /**
     * Связь с платежом
     */
    public function payment()
    {
        return $this->morphOne(Payment::class, 'payable');
    }

    /**
     * Проверка, действителен ли билет
     */
    public function isValid()
    {
        return $this->status === 'paid' && !$this->used_at;
    }

    /**
     * Использовать билет
     */
    public function use()
    {
        if ($this->isValid()) {
            $this->update([
                'status' => 'used',
                'used_at' => now()
            ]);
            return true;
        }
        return false;
    }
}