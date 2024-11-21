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
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('bank');
            $table->string('account');
            $table->string('loan_type');
            $table->decimal('loan_amount', 15, 2); // Adjust precision as needed
            $table->integer('installment_count');
            $table->decimal('interest_rate', 5, 2)->default(10.00); // Default to 10%
            $table->decimal('installment_amount', 15, 2)->nullable();
            $table->decimal('amount_payable', 15, 2)->nullable();
            $table->string('date_applied');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_applications');
    }
};
