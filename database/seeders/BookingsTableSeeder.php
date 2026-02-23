<?php
// database/seeders/BookingsTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Skate;

class BookingsTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $skates = Skate::all();
        
        if ($users->count() > 0 && $skates->count() > 0) {
            for ($i = 1; $i <= 5; $i++) {
                $user = $users->random();
                $skate = $skates->random();
                $hours = rand(1, 4);
                
                Booking::create([
                    'user_id' => $user->id,
                    'full_name' => $user->name,
                    'phone' => $user->phone,
                    'hours' => $hours,
                    'skate_id' => $skate->id,
                    'skate_size' => $skate->size,
                    'total_price' => 300 + ($skate->price_per_hour * $hours),
                    'status' => ['pending', 'paid', 'cancelled'][rand(0, 2)],
                    'payment_id' => 'payment_' . uniqid(),
                    'created_at' => now()->subDays(rand(1, 30)),
                    'updated_at' => now(),
                ]);
            }
        }
        
        $this->command->info('Бронирования успешно добавлены!');
    }
}