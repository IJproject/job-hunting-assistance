<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserCompany extends Model
{
    use HasFactory;

    protected $attributes = [
        'status_number' => 1,
    ];

    protected $fillable = [
        'user_id',
        'company_number',
        'job',
        'status_number',
        'memo',
        'salary',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function user_company_qas(): HasMany
    {
        return $this->hasMany(UserCompanyQa::class);
    }
    
    public function user_company_selections(): HasMany
    {
        return $this->hasMany(UserCompnaySelection::class);
    }
}