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
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref', 50);
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('type', 50)->nullable();
            $table->string('status', 50)->default('draft');
            $table->date('date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('description', 250);
            $table->float('total_amount')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
