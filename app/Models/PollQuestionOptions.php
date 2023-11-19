<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PollQuestionOptions extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'poll_question',
        'option'
    ];

    public function poll_question():BelongsTo {
        return $this->belongsTo(PollQuestions::class);
    }
}
