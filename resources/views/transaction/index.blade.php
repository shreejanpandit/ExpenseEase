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
    .tran_color{
      color: whitesmoke;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-light px-4 " style="background-color: #e3f2fd; ">
    <a class="navbar-brand navbar-brand-custom ml-2" href="{{route('transaction.index')}}">
      <span class="easy">Easy</span><span class="expense">Expense</span>
    </a>
    <a class="navbar-brand tran_color  ml-2 btn btn-success" href="{{route('transaction.create')}}">
      <i class="fa fa-plus"></i> Add Transaction
    </a>

  </nav>

  <div class="container">
    <div class="row d-flex justify-content-center">
      @if(Session::has('sucess'))
      <div class="col-md-10 mt-4">
        <div class="alert alert-success"> 
        {{Session::get('sucess')}}
        </div>
        @endif
      </div>
      <div class="col-md-10">
        <div class="card border-0 shadow-lg my-4">
          <div class="card-header">
            <h3>Your Transaction Details</h3>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-qasE+TvO9oK8SqVjTzG4jqYTLRkTTsUwZ4EKQmOuZwbIe7Bh7Ib8F2fgsxODGbCs" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-rbcdm3Cjf6Qvf3WB5V9F+zCtfOBRCUXqjJ9twH7OH+Jwtx+rca4eYEGiI5H1k1CI" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</body>

</html>