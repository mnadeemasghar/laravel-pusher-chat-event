@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">Chat</div>
                        <div class="card-body" id='chats'></div>
                        <div class="card-footer">
                            <div class="form-group">
                                <label for="message">Message</label>
                                <input type="text" id="message" name="message" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="from_user_id">from_user_id</label>
                                <input type="text" id="from_user_id" name="from_user_id" value="{{ Auth::user()->id }}" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="to_user_id">to_user_id</label>
                                <input type="text" id="to_user_id" name="to_user_id" value="{{ Auth::user()->id }}" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary" id="send">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#send").click(function(){

        var token = $('#token').val();
        var from_user_id = $('#from_user_id').val();
        var to_user_id = $('#to_user_id').val();
        var message = $('#message').val();

        var chat_data = { 
            "_token": "{{ csrf_token() }}",
            "from_user_id": from_user_id,
            "to_user_id": to_user_id,
            "message": message
        };

        $.ajax({
                    /* the route pointing to the post function */
                    url: "{{route('send')}}",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: chat_data,
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        alert("Reponse Data: " + JSON.stringify(data) );
                    }
                });
    });
</script>
@endsection
