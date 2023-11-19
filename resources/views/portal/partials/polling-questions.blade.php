<div class="card rounded-0 mb-4">
    <div class="card-header bg-white">
        <p class="fw-bold mb-0">Poll Questions </p>
    </div>
    <div class="card-body">

        @if(count($poll->poll_questions)== 0)
            <p>No Questions available. Create Some</p>
        @else



           @foreach($poll->poll_questions as $question)
                <div class="card mb-2 rounded-1">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-body-secondary">
                            Question : {{$loop->index + 1}}
                        </h6>
                        <p class="card-title"> {{$question->question}} </p>

                        @foreach($question->poll_question_options as $option)
                            <div class="form-check text-capitalize">
                                <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                                <label class="form-check-label" for="flexRadioDisabled">
                                   {{$option->option}}
                                </label>
                            </div>
                        @endforeach

                    </div>
                </div>
           @endforeach

        @endif

    </div>
</div>
