<html>
<head>
    <title>Laravel 8 Ajax Request example</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<div class="container">
    <h1>Отправте свои данный нам!</h1>

    <form>
@csrf
        <div class="form-group">
            <label>Имя:</label>
            <input type="text" name="user_name" value="{{old('user_name')}}" class="form-control" placeholder="Name" required="">
        </div>

        <div class="form-group">
            <label>Тел:</label>
            <input type="number" name="phone_number" value="{{old('phone_number')}}" class="form-control"  required="">
        </div>

        <div class="form-group">
            <strong>Почта:</strong>
            <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email" required="">
        </div>

        <div class="form-group">
            <button class="btn btn-success btn-submit">Отправит</button>
        </div>

    </form>
</div>

</body>
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e){

        e.preventDefault();

        var user_name = $("input[name=user_name]").val();
        var phone_number = $("input[name=phone_number]").val();
        var email = $("input[name=email]").val();

        $.ajax({
            type:'POST',
            url:"{{ route('message-store') }}",
            data:{user_name:user_name, phone_number:phone_number, email:email},
            success:function(data){
                alert(data.success);
            }
        });

    });
</script>
</html>
