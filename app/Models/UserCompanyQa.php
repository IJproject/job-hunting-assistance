<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCompanyQa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_company_id',
        'question_number',
        'answer',
        'answer_date',
    ];
    
    public function user_company(): BelongsTo
    {
        return $this->belongsTo(UserCompany::class);
    }
}