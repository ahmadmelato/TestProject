<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    use HasFactory;

    // Specify table name if it doesn't follow Laravel's naming convention
    protected $table = 'test_results';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'test_id',
        'user_id',
        'mark',
    ];

    // Define relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define relationships if needed
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}