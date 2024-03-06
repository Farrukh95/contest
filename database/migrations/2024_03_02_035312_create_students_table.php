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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('email')->unique();
            $table->foreignId('group_id')->constrained('groups');
            $table->foreignId('quote_type_id')->constrained('quote_types'); // Тип квоты (целевая квота, платная основа, бюджетное финансирование)
            $table->integer('rating')->nullable(); // Рейтинг студента
            $table->integer('entrance_exam_results')->nullable(); // Сумма результатов ВИ при поступлении в ВУЗ
            $table->decimal('average_exam_score', 5, 2)->nullable(); // Средний балл аттестации за 1 и 2 семестр
            $table->decimal('average_subject_score', 5, 2)->nullable(); // Средний балл по базовым предметам
            $table->integer('entrance_test_results')->nullable(); // Результаты входного тестирования
            $table->boolean('is_disabled')->default(false); // Флаг инвалидности студента
            $table->integer('additional_score')->default(0); // Дополнительный балл для инвалидов

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
