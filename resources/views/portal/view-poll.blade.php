@extends('layouts.portal')

@section('title','View Polls')

@section('portal-styles')

@endsection

@section('content')

    <div class="card rounded-0">
        <div class="card-header rounded-0">
            <h4 class="mb-0">View Polls</h4>
        </div>
        <div class="card-body">
            @if(count($polls) == 0)

                No polls have been created.  <a href="{{route('polls.add')}}">Create some</a>

            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($polls as $poll)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$poll -> title}}</td>
                                <td>{{$poll -> description}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" title="view poll" href="{{route('polls.view.single',['id'=>$poll->id])}}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button  data-coreui-toggle="modal" data-coreui-target="#staticBackdrop" class="btn btn-danger text-white btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            @endif
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                   <div class="text-center mt-3">
                       <i class="fa fa-question-circle fa-5x"></i>
                       <h3>Delete poll</h3>
                    <p>Are you sure you'd like to delete this poll? This action is irreversible</p>

                    <button type="button" class="btn btn-dark" data-coreui-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger text-white">Delete</button>
                </div>
            </div>
        </div>
    </div>



@endsection
