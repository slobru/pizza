<!DOCTYPE html>
<html>
    <head>
        <title>{{$title}} | Pizza</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Take a pizza order">

        <!-- Bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap/3.3.0/css/bootstrap.min.css">
        <link href="{{asset('assets/css/style.css?v=1.0.11')}}" rel="stylesheet" media="screen">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="page-header">
                        <h1>Pizza Order</h1>
                    </div>
                    @if (Session::has('alert'))
                        {{Session::get('alert')}}
                    @endif
                    <form role="form" method="POST" action="{{ URL::action('PizzaController@postOrder') }}">
                        {{Form::token()}}
                        <h4>What toppings would you like on your pizza?</h4>
                        <div class="checkbox">
                            <label>
                                {{Form::checkbox('topping1', '1')}}
                                Pepperoni
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                {{Form::checkbox('topping2', '1')}}
                                Green Peppers
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                {{Form::checkbox('topping3', '1')}}
                                Bacon
                            </label>
                        </div>
                        <br>
                        <h4>Customer Information</h4>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Order Pizza" />
                    </form>
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </body>
</html>
