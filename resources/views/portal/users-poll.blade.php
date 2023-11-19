@extends('layouts.portal')

@section('title','Vote')

@section('portal-styles')

@endsection

@section('content')

    <div class="card rounded-0">
        <div class="card-header bg-white">
            <p class="fw-bold mb-0">Polls</p>
        </div>
        <div class="card-body pb-0">
            <div class="row">
                @foreach($polls as $poll)
                    <div class="col-sm-4">
                        <div class="card mb-3">
                            <div class="card-header bg-white">
                                <h5 class="card-title text-capitalize">{{$poll->title}}</h5>
                                <span class="rounded-1 text-end text-capitalize badge bg-info">Status: not done</span>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{$poll->description}}</p>
                            </div>
                            <div class="card-footer bg-white">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="">Questions: {{count($poll->poll_questions)}}</span>
                                    @if('true')
                                        <a href="{{route('polls.user',$poll->id)}}" class="card-link">Begin Poll</a>
                                    @elseif('false')
                                        <a href="#" class="card-link">View Results</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
