<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PollQuestions extends Model
{
    use HasFactory;

    protected $fillable = [
        'poll',
        'question'
    ];

    public function poll():BelongsTo {
        return $this->belongsTo(Polls::class);
    }

    public function pollQuestions():HasMany {
        return $this->hasMany(PollQuestions::class);
    }
}
