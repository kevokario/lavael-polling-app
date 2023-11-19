@extends('layouts.portal')

@section('title','Vote')

@section('portal-styles')

@endsection

@section('content')
    <form action="">
        <div class="card rounded-0">
            <div class="card-header bg-white">
                <p class="fw-bold mb-0 text-capitalize"> Poll - {{$poll->title}} </p>
            </div>
            <div class="card-body">
                @foreach($poll->poll_questions as $question)
                    <div class="card mb-2 rounded-1">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                Question : {{$loop->index + 1}}
                            </h6>
                            <p class="card-title"> {{$question->question}} </p>

                            @foreach($question->poll_question_options as $option)
                                <div class="form-check text-capitalize">
                                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="radio{{$option->id}}">
                                    <label class="form-check-label" for="radio{{$option->id}}">
                                        {{$option->option}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card-footer bg-white">
                <div class="div text-end">
                    <button class="btn btn-primary">
                        Save Poll Results
                    </button>
                </div>
            </div>

        </div>
    </form>
@endsection
