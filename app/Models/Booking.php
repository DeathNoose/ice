<?php
// app/Models/Booking.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'phone',
        'hours',
        'skate_id',
        'skate_size',
        'total_price',
        'status',
        'payment_id'
    ];

    protected $casts = [
        'hours' => 'integer',
        'total_price' => 'decimal:2'
    ];

    /**
     * Связь с пользователем
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Связь с коньками
     */
    public function skate()
    {
        return $this->belongsTo(Skate::class);
    }

    /**
     * Связь с платежом
     */
    public function payment()
    {
        return $this->morphOne(Payment::class, 'payable');
    }

    /**
     * Получить стоимость аренды коньков
     */
    public function getSkatesPriceAttribute()
    {
        if ($this->skate) {
            return $this->skate->price_per_hour * $this->hours;
        }
        return 0;
    }

    /**
     * Получить стоимость билета
     */
    public function getTicketPriceAttribute()
    {
        return 300;
    }
}