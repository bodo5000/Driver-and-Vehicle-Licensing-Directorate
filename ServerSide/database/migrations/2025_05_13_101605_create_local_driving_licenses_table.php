<?php

use App\Models\Application;
use App\Models\LicenseClass;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('local_driving_licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Application::class)->constrained()->onDelete('restrict');
            $table->foreignIdFor(LicenseClass::class)->constrained('licenses_classes')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('local_driving_licenses');
    }
};
