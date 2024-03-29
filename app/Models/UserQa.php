<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserQa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_number',
        'answer',
        'answer_date',  
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}