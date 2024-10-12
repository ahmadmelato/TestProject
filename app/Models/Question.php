<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    // Specify table name if it doesn't follow Laravel's naming convention
    protected $table = 'questions'; // Use plural and lowercase

    // Specify fillable properties for mass assignment
    protected $fillable = [
        'content',  // 'id' is not needed since it's auto-incrementing
        'test_id',
    ];
    
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}