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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('student_code', 7)->unique();
            $table->string('gender', 50);
            $table->timestamp('date_of_birth');
            $table->string('email', 100)->unique();
            $table->string('address', 200);
            $table->unsignedBigInteger('course_id')->nullable()->constrained('courses')->onDelete('set null');
            $table->unsignedBigInteger('major_id')->nullable()->constrained('majors')->onDelete('set null');
            $table->string('cccd_number', 20);
            $table->timestamp('cccd_issue_date')->nullable(); // Allow null or remove default value
            $table->string('cccd_place', 100);
            $table->timestamp('year_of_enrollment')->nullable(); // Allow null or remove default value
            $table->unsignedBigInteger('study_status_id')->nullable()->constrained('study_statuses')->onDelete('set null');
            $table->string('semesters');
            $table->string('phone', 15);
            $table->unsignedBigInteger('role_id')->nullable()->constrained('roles')->onDelete('set null');
            $table->string('OTP');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps(); // This method will handle `created_at` and `updated_at` columns with no default value issues
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
