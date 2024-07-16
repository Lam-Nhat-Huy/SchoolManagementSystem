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
        Schema::create('teacher_evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id')->nullable()->constrained('teachers')->onDelete('set null');
            $table->unsignedBigInteger('student_id')->nullable()->constrained('students')->onDelete('set null');
            $table->integer('first_rating_level')->nullable();
            $table->integer('second_rating_level')->nullable();
            $table->integer('third_rating_level')->nullable();
            $table->integer('fourth_rating_level')->nullable();
            $table->integer('fifth_rating_level')->nullable();
            $table->date('evaluation_date');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_evaluations');
    }
};
