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
        Schema::create('licenses_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60)->unique();
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('min_allowed_age');
            $table->unsignedTinyInteger('default_validity_length');
            $table->decimal('fees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses_classes');
    }
};
