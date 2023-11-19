<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PollQuestions extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'poll',
        'question'
    ];

    public function poll():BelongsTo {
        return $this->belongsTo(Polls::class);
    }

    public function poll_question_options():HasMany {
        return $this->hasMany(PollQuestionOptions::class,'poll_question','id');
    }
}
