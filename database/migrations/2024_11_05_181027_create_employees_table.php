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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('company');
            $table->string('job_title');
            $table->enum('class', ["White Collars","Blue Collars"]);
            $table->string('national_id');
            $table->string('employee_no');
            $table->foreignId('report_to');
            $table->foreignId('location_id');
            $table->foreignId('sector_id');
            $table->foreignId('department_id');
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
