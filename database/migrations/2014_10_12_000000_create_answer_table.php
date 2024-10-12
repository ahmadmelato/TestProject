
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->text('answer'); // The answer content
            $table->foreignId('question_id')
                  ->constrained('questions') // Foreign key reference to the questions table
                  ->onDelete('cascade') // Delete answers if the associated question is deleted
                  ->onUpdate('cascade'); // Update question_id if the question's ID changes
            $table->boolean('is_correct')->default(false); // Indicates if the answer is correct
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('answers'); // Drop the answers table if it exists
    }
};