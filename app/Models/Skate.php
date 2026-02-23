<?php
// app/Models/Skate.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skate extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'brand',
        'size',
        'quantity',
        'price_per_hour',
        'description',
        'image',
        'is_available'
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price_per_hour' => 'decimal:2'
    ];

    /**
     * Связь с бронированиями
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Проверка доступности
     */
    public function isAvailable()
    {
        return $this->is_available && $this->quantity > 0;
    }

    /**
     * Уменьшить количество
     */
    public function decreaseQuantity($amount = 1)
    {
        if ($this->quantity >= $amount) {
            $this->decrement('quantity', $amount);
            return true;
        }
        return false;
    }

    /**
     * Увеличить количество
     */
    public function increaseQuantity($amount = 1)
    {
        $this->increment('quantity', $amount);
    }
}