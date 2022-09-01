<!DOCTYPE html>
<html>
<head>
    <title>Task send Message</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container mt-5">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Отправте свои данные
        </div>
        <div>
            @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            @if(Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
            @endif
        </div>
        <div class="card-body">
            <div class="alert alert-success" role="alert" id="successMsg" style="display: none">
                Thank you for getting in touch!
            </div>
            <form id="SubmitForm">
                @csrf
                <div class="mb-3">
                    <label for="InputName" class="form-label">Name</label>
                    <input type="text" class="form-control" name="user_name" id="InputName">
                    <span class="text-danger" id="nameErrorMsg"></span>
                </div>

                <div class="mb-3">
                    <label for="InputEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="InputEmail">
                    <span class="text-danger" id="emailErrorMsg"></span>
                </div>

                <div class="mb-3">
                    <label for="InputMobile" class="form-label">Mobile</label>
                    <input type="number" name="phone_number" class="form-control" id="InputMobile">
                    <span class="text-danger" id="mobileErrorMsg"></span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">

    $('#SubmitForm').on('submit',function(e){
        e.preventDefault();
        $.ajaxSetup({
            beforeSend: function(xhr, type) {
                if (!type.crossDomain) {
                    xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                }
            },
        });
        let user_name = $('#InputName').val();
        let email = $('#InputEmail').val();
        let phone_number = $('#InputMobile').val();
        $.ajax({
            url: "/message",
            type:"POST",
            contentType: "application/json; charset=utf-8",
            dataType: "application/json",
            data:{
                _token: "{{ csrf_token() }}",
                user_name:user_name,
                email:email,
                phone_number:phone_number,
            },
            success: function (data) {
                console.log(data);
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);

            },
        });
    });
</script>
</body>
</html>
