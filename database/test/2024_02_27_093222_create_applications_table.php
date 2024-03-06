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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->unsignedBigInteger('module_priority_1');
            $table->unsignedBigInteger('module_priority_2');
            $table->foreignId('contest_id')->constrained('contests');
            $table->date('application_date');
            $table->timestamps();

            $table->foreign('module_priority_1')->references('id')->on('modules');
            $table->foreign('module_priority_2')->references('id')->on('modules');

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
