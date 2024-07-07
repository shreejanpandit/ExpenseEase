<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EaseExpense</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .navbar-brand-custom {
            font-size: 1.5rem;
        }

        .navbar-brand-custom .easy {
            color: green;
        }

        .navbar-brand-custom .expense {
            color: red;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
            @if(Session::has('error'))
                <div class="col-md-10 mt-4">
                    <div class="alert alert-success">
                        {{Session::get('error')}}
                    </div>
                    @endif
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header">
                        <div class="navbar-brand-custom ml-2" href="">
                            <span class="easy">Easy</span><span class="expense">Expense</span> - Register
                        </div>
                    </div>
                    <form action="{{route('auth.register.post')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label h5">User Name</label>
                                <input type="text" placeholder="name" value="{{old('name')}}" class=" @error('name') is-invalid @enderror form-control form-control-lg" name="name" id="name" autofocus>
                                @error('name')
                                <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5">Email</label>
                                <input type="text" placeholder="something@mail.com" value="{{old('email')}}" class=" @error('email') is-invalid @enderror form-control form-control-lg" name="email" id="email">
                                @error('email')
                                <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5">Password</label>
                                <input type="password" value="{{old('password')}}" class=" @error('password') is-invalid @enderror form-control form-control-lg" placeholder="Password" name="password" id="password" >
                                @error('password')
                                <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label h5">Confirm Password</label>
                                <input type="password" placeholder="Password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                @error('password')
                                <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-qasE+TvO9oK8SqVjTzG4jqYTLRkTTsUwZ4EKQmOuZwbIe7Bh7Ib8F2fgsxODGbCs" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-rbcdm3Cjf6Qvf3WB5V9F+zCtfOBRCUXqjJ9twH7OH+Jwtx+rca4eYEGiI5H1k1CI" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</body>

</html>