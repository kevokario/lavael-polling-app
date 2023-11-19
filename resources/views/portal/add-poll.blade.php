@extends('layouts.portal')

@section('title','Add Poll')

@section('portal-styles')

@endsection

@section('content')

    <div class="card rounded-0">
        <div class="card-header bg-white">
            <p class="mb-0 fw-bold">Add Poll </p>
        </div>
        <div class="card-body">

            @isset($success)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{$success}}
                    <button type="button" class="btn-close btn-sm btn" data-coreui-dismiss="alert" aria-label="Close"></button>
                </div>
            @endisset

           @isset($errors)
                    @if(count($errors)>0)
                        @foreach($errors as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong>Error!</strong> {{$error}}
                                <button type="button" class="btn-close btn-sm btn" data-coreui-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif
           @endisset

            <form method="post" action="{{route('polls.create')}}">

                <input name="user" hidden value="{{Auth::user()->id}}">

                @csrf

                <div class="mb-3">
                    <label for="title">Poll Title</label>
                    <input type="text" class="form-control" autofocus required name="title" id="title"
                           placeholder="poll title">
                    <div class="text-danger"></div>
                </div>
                <div class="mb-3">
                    <label for="title">Poll Description</label>
                    <textarea rows="5" name="description" required class="form-control" id="title"
                              placeholder="poll title"></textarea>
                    <div class="text-danger"></div>

                </div>

                <button class="btn btn-primary">Create Poll</button>
            </form>
        </div>
    </div>

@endsection
