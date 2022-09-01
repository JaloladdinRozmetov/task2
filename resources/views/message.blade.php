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
            <form id="SubmitForm" method="POST" action="{{route('message-store')}}">
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
</body>
</html>
