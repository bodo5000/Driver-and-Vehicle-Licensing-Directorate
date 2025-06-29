<?php

use App\Models\LocalDrivingLicense;
use App\Models\TestType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('driving_test_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TestType::class)->constrained()->onDelete('restrict');
            $table->foreignIdFor(LocalDrivingLicense::class)->constrained()->onDelete('restrict');
            $table->foreignId('created_by')->constrained('users')->onDelete('restrict');
            $table->boolean('is_locked')->default(false);
            $table->decimal('paid_fees');
            $table->foreignId('retake_application_test_id')->nullable()->constrained('applications')->onDelete('restrict');
            $table->timestamps();
            $table->unique(['local_driving_license_id', 'test_type_id'], 'driving_test_license_test_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driving_test_appointments');
    }
};
