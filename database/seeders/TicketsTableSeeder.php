<?php
// database/seeders/TicketsTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\User;

class TicketsTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        
        if ($users->count() > 0) {
            for ($i = 1; $i <= 5; $i++) {
                $user = $users->random();
                
                Ticket::create([
                    'user_id' => $user->id,
                    'full_name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'price' => 300,
                    'status' => ['pending', 'paid', 'used'][rand(0, 2)],
                    'payment_id' => 'payment_' . uniqid(),
                    'used_at' => rand(0, 1) ? now() : null,
                    'created_at' => now()->subDays(rand(1, 30)),
                    'updated_at' => now(),
                ]);
            }
        }
        
        $this->command->info('Билеты успешно добавлены!');
    }
}