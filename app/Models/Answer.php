<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    // Specify table name if it doesn't follow Laravel's naming convention
    protected $table = 'answers';

    // Specify fillable properties for mass assignment
    protected $fillable = [
        'id',
        'answer',
        'question_id',
        'is_correct',
    ];

    // Define relationships if needed
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}