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

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function isAvailable()
    {
        return $this->is_available && $this->quantity > 0;
    }
}