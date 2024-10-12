<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Name of the test
            $table->foreignId('teacher_id')
                ->constrained('users') // Assuming 'users' is the table for teachers
                ->onDelete('cascade')  // Automatically delete tests when the teacher is deleted
                ->onUpdate('cascade');  // Automatically update teacher_id if the teacher's ID changes
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('tests'); // Drop the tests table if it exists
    }
};
