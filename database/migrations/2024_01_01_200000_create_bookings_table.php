<?php
// database/migrations/2024_01_01_200000_create_bookings_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone');
            $table->integer('hours');
            $table->foreignId('skate_id')
                  ->nullable()
                  ->constrained('skates')  // Явно указываем таблицу
                  ->onDelete('set null')
                  ->onUpdate('cascade');   // Добавляем onUpdate
            $table->string('skate_size')->nullable();
            $table->decimal('total_price', 8, 2);
            $table->enum('status', ['pending', 'paid', 'cancelled'])->default('pending');
            $table->string('payment_id')->nullable();
            $table->timestamps();
            
            // Добавляем индексы для оптимизации
            $table->index('status');
            $table->index('payment_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};