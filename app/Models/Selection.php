<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Selection extends Model
{
    use HasFactory;

    protected $dates = [
        'date'
    ];

    protected $fillable = [
        'applicant_company_id',
        'selection_step_state',
        'date',
        'time',
        'interviewer',
        'memo',
    ];

    public function applicant_company(): BelongsTo
    {
        return $this->belongsTo(ApplicantCompany::class);
    }
}