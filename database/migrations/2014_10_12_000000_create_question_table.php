
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->text('content'); // Content of the question
            $table->foreignId('test_id')
                  ->constrained('tests') // Assuming 'tests' is the related table
                  ->onDelete('cascade')  // Delete questions if the test is deleted
                  ->onUpdate('cascade');  // Update test_id if the test's ID changes
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions'); // Drop the questions table if it exists
    }
};