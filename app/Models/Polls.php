<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Polls extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'user',
        'title',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function poll_questions(): HasMany
    {
        return $this->hasMany(PollQuestions::class,'poll','id');
    }
}
