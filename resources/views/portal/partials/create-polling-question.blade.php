<div class="card rounded-0 mb-4">
    <div class="card-header bg-white">
        <p class="fw-bold mb-0">Create Poll Questions </p>
    </div>
    <div class="card-body">

        @isset($question_success)
            @json($question_success)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{$question_success}}
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


        <form onsubmit="submitQuestion()" method="post" action="{{ route('polls.create.question',$poll->id) }}" data-token="{{ csrf_token() }}" id="questionForm">
            <div class="form-group mb-3">
                <label for="question">Set Question</label>
                <textarea name="question"
                          id="question"
                          rows="4"
                          required
                          class="form-control"
                          placeholder="Question"></textarea>
            </div>
            <div class="form-group mb-3 text-end">
                <label for="">Add Answer Options</label>
                <button type="button" id="addOption" onclick="addAnswerOption()" class=" btn btn-outline-primary"><i class="fas fa-plus"></i></button>
            </div>
            <section  class="table-responsive" id="answerOptions">
                <table class="table table-borderless">
                    <tbody>

                    </tbody>
                </table>
            </section>

            <div class="form-group mb-0 text-end">
                <button class="btn btn-primary">Save Question</button>
            </div>
        </form>

    </div>
</div>

<script>

    function addAnswerOption(){
        const tableItems = $('#answerOptions table tbody tr');

        const tableItemsLength =tableItems.length;



        const index = tableItemsLength === 0 ? tableItemsLength:  parseInt($("#answerOptions table tbody tr:last td:first label").attr('for'))+1;

        const control = getControlTemplate(index);

        $('#answerOptions table tbody').append(control);

        if ( $('#answerOptions table tbody tr').length === 4)
            $('#addOption').attr('disabled','true')


    }

    function getControlTemplate(number){
        return`
        <tr data-id='${number}'>
          <td style="width: 15%">
            <label for="${number}" class="col-form-label">Option Answer</label>
          </td>
          <td>
            <input type="text" required name=${number} id="${number}" class="form-control">
          </td>
            <td style="width: 1%">
                <button type="button" onclick="removeElement(${number})" class="btn btn-danger text-white"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        `;
    }

    function removeElement(number){
        $("#answerOptions tr[data-id='" + number + "']").remove();
        $('#addOption').removeAttr('disabled');
    }

    function submitQuestion(){

        event.preventDefault();

        const tableItems = $('#answerOptions table tbody tr');

        const tableItemsLength =tableItems.length;

        if(tableItemsLength < 2){
            alert("provide atleast two answer options")
        }
        else {
            const controls = $('#questionForm').find('.form-control');
            console.log(controls)
            let formValid = true;
            let optionsArray = [];
            let question = '';

            for (let a =0; a < controls.length; a++){
                const ctrl = controls[a];
                formValid = ctrl.checkValidity()
                if(a > 0 ) optionsArray.push(ctrl.value);
                if(a === 0 ) question = ctrl.value;
            }

            if(!formValid){
                alert("Please ensure all fields are filled accordingly");
                return;
            }

            const formData = {};
            const token = document.getElementById('questionForm').getAttribute('data-token');
            const url = document.getElementById('questionForm').getAttribute('action');

            formData.options = optionsArray;

            $.ajax({
                type: "POST",
                url: url,
                data: {
                    "_token":token,
                    options:JSON.stringify(optionsArray),
                    question:question
                },
                success: function (response) {
                    const res = JSON.parse(response);
                    document.getElementById("questionForm").reset();
                    $('#answerOptions table tbody').html('');
                    alert(res.success);
                },
                error: function (error) {
                    console.log(error)
                }
            });


        }
    }
</script>
