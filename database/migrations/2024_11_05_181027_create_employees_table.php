<?php

use App\Models\Department;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Sector;
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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->nullable();
            $table->string('name_en');
            $table->string('email')->unique();
            $table->enum('status', ["active", "inactive", "terminated"]);
            $table->string('company')->default('Giza Cable Industries');
            $table->string('job_title');
            $table->enum('class', ["White Collars", "Blue Collars"]);
            $table->string('national_id');
            $table->string('employee_no');
            $table->foreignIdFor(Employee::class, 'report_to')->nullable();
            $table->foreignIdFor(Location::class);
            $table->foreignIdFor(Sector::class);
            $table->foreignIdFor(Department::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
