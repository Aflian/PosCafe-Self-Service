<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
        
            $table->foreignId('order_id')
                  ->constrained('orders')
                  ->cascadeOnDelete();
        
            $table->foreignId('payment_method_id')
                  ->constrained('payment_methods')
                  ->restrictOnDelete();
        
            $table->decimal('nominal', 12, 2);
            $table->string('bukti_pembayaran')->nullable();
        
            $table->enum('status', ['pending', 'valid', 'invalid'])
                  ->default('pending');
        
            $table->foreignId('verified_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();
        
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
