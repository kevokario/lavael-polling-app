<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPolls extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'user',
        'poll_question',
        'poll_question_option'
    ];

    public function user() :BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function poll_question() :BelongsTo {
        return $this->belongsTo(PollQuestions::class);
    }
    public function poll_question_option() :BelongsTo {
        return $this->belongsTo(PollQuestionOptions::class);
    }


}

