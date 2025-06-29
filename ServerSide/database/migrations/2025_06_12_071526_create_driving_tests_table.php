<?php

use App\Models\DrivingTestAppointment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('driving_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DrivingTestAppointment::class)->unique()->constrained()->onDelete('restrict');
            $table->enum('result', ['new', 'pass', 'fail'])->default('new');
            $table->text('note')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driving_tests');
    }
};
