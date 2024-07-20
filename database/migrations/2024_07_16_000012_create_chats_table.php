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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable()->constrained('students')->onDelete('set null');
            $table->unsignedBigInteger('role_id')->default(4);
            $table->unsignedBigInteger('reply_to')->nullable();
            $table->text('message');
            $table->timestamp('sent_at')->useCurrent();
            $table->boolean('is_reply')->default(false);
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
