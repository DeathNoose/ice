<?php
// database/migrations/2024_01_01_000004_create_payments_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id');
            $table->string('payment_type'); // ticket, booking
            $table->unsignedBigInteger('payable_id');
            $table->string('payable_type');
            $table->decimal('amount', 8, 2);
            $table->string('status');
            $table->json('payment_data')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};