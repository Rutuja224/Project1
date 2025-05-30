<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h4>Login</h4>
                <hr>
                <form action="{{route('loginUser')}}" method="POST">
                    @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    <div class="form-group m-2">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" >
                        <span class="text-danger">@error ('email') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group m-2">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" >
                        <span class="text-danger">@error ('password') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group m-2">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                    <a href="register">Not registered? </a>

                </form>
            </div>
        </div>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</html>