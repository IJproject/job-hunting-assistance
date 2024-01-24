<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserConpanySelection extends Model
{
    use HasFactory;

    protected $dates = [
        'date'
    ];

    protected $fillable = [
        'user_company_id',
        'step_number',
        'date',
        'time',
        'interviewer',
        'memo',
    ];

    public function user_company(): BelongsTo
    {
        return $this->belongsTo(UserCompany::class);
    }
}