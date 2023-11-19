@extends('layouts.portal')

@section('title','View Polls')

@section('portal-styles')

@endsection

@section('content')

    <div class="card rounded-0">
        <div class="card-header bg-white rounded-0">
            <p class="mb-0 fw-bold">View Polls</p>
        </div>
        <div class="card-body">
            @if(count($polls) == 0)

                No polls have been created.  <a href="{{route('polls.add')}}">Create some</a>

            @else
                <div class="table-responsive">
                    <table class="table table-bordered mb-0 table-striped table-hover">
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
                                    <button  data-coreui-toggle="modal"
                                             data-coreui-target="#staticBackdrop"
                                             data-poll="{{json_encode($poll)}}"
                                             onclick="popup(this)"
                                             class="btn btn-danger text-white btn-sm">
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

    <input type="hidden" data-token="{{ csrf_token() }}" value="{{ route('polls.delete')  }}" id="deleteUrl">


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                   <div class="text-center mt-3">
                       <i class="fa fa-question-circle fa-5x"></i>
                       <h3>Delete <strong id="title"></strong></h3>
                    <p>Are you sure you'd like to delete this poll? This action is irreversible</p>

                    <button type="button" class="btn btn-dark" data-coreui-dismiss="modal">Close</button>
                    <button type="button" onclick="deleteItem(this)" id="deletePoll" class="btn btn-danger text-white">Delete</button>
                </div>
            </div>
        </div>
    </div>


        <script>
            function popup(button) {
                // Accessing the data attribute and parsing it as JSON
                const pollData = JSON.parse(button.getAttribute('data-poll'));
                console.log(pollData);

                const title = document.getElementById('title');
                const deleteBtn = document.getElementById('deletePoll');

                deleteBtn.setAttribute('data-item',button.getAttribute('data-poll'));

                title.innerHTML = pollData.title;

            }

            function deleteItem(button) {
                const pollData = JSON.parse(button.getAttribute('data-item'));
                const token = document.getElementById('deleteUrl').getAttribute('data-token');
                console.log('dele',pollData )
                $.ajax({
                    url: document.getElementById('deleteUrl').value,
                    type: 'DELETE',
                    data:{
                        "_token": token,
                        customId:1
                    },
                    success: function (response) {
                        // Handle success, e.g., show a message or update the UI
                        console.log(response);
                        window.location.reload()
                    },
                    error: function (xhr, status, error) {
                        // Handle errors, e.g., show an error message
                        console.error(xhr.responseText);
                    }
                });
            }
        </script>



@endsection
