<?php

use App\Models\ApplicationType;
use App\Models\Person;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users')->onDelete('restrict');
            $table->foreignIdFor(Person::class)->constrained()->onDelete('restrict');
            $table->foreignIdFor(ApplicationType::class)->constrained()->onDelete('restrict');
            $table->enum('status', ['new', 'canceled', 'completed'])->default('new');
            $table->timestamp('last_status_updated')->default(now());
            $table->decimal('paid_feed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
