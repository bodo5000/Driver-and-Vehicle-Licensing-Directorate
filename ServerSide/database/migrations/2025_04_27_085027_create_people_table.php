<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('national_no', 10)->unique();
            $table->string('first_name', 20);
            $table->string('second_name', 20);
            $table->string('third_name', 20);
            $table->string('last_name', 20);
            $table->string('email', 60)->unique();
            $table->string('phone', 12)->unique();
            $table->date('date_of_birth')->index();
            $table->enum('gender', ['male', 'female'])->index();
            $table->string('address', 255)->index();
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->index(['first_name', 'second_name', 'third_name', 'last_name'], 'full_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
