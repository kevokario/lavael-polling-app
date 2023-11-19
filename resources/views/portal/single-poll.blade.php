@extends('layouts.portal')

@section('title','View Poll')

@section('portal-styles')

@endsection

@section('content')


    @if($poll == null)
        <div class="card rounded-0">
            <div class="card-header bg-white">
                <p class="fw-bold mb-0">Poll - Error</p>
            </div>
            <div class="card-body">
                <p class="mb-0">Selected poll doesn't exist, please try creating another</p>
            </div>
        </div>
    @else
        <div class="card rounded-0 mb-4">
            <div class="card-header bg-white">
                <p class="fw-bold mb-0">Poll - {{$poll->title}}</p>
            </div>
            <div class="card-body">
                <p> <i>Poll info :</i>{{$poll->description}}</p>
                <div class="text-end">

                    @isset($createQuestion)
                        <form style="display: inline" action="{{route('polls.view.single',$poll->id)}}">
                            @csrf
                            <button  class="btn btn-outline-primary btn-sm">
                                View Questions
                                <i class="fas fa-file-pdf">
                                    <sup class="mb-2"><i class="fa fa-folder-open"></i></sup>
                                </i>
                            </button>
                        </form>
                    @else
                        <form style="display: inline" action="{{route('polls.add.question',$poll->id)}}">
                            @csrf
                            <button  class="btn btn-outline-primary btn-sm">
                                Add Question
                                <i class="fas fa-file-pdf">
                                    <sup class="mb-2"><i class="fa fa-plus"></i></sup>
                                </i>
                            </button>
                        </form>
                    @endisset

                    <button data-coreui-toggle="modal"
                            data-coreui-target="#staticBackdrop" class="btn btn-primary btn-sm">
                        Edit
                        <i class="fas fa-file-pdf">
                            <sup class="mb-2"><i class="fa fa-pen"></i></sup>
                        </i>
                    </button>
                </div>
            </div>
        </div>

        <!--
        ==========================
        Include polling questions
        ==========================
         -->
        @isset($createQuestion)
            @include('portal.partials.create-polling-question',['pollId'=>$poll->id])
        @else
            @include('portal.partials.polling-questions',['poll'=>$poll])
        @endisset

        <div class="modal fade" id="staticBackdrop" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="text-center mt-3">
                            <i class="fa fa-sad-cry fa-5x"></i>
                            <h3>Edit <strong>Poll</strong></h3>
                            <p>This feature is still under construction</p>
                            <button type="button" class="btn btn-dark" data-coreui-dismiss="modal">Okay</button>
                             </div>
                    </div>
                </div>
            </div>
    @endif





@endsection
