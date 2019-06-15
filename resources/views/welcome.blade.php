<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <p>login om te ontlenen</p>
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md text-capitalize">
                    lokale bibliotheek
                </div>
                <form action="{{\Illuminate\Support\Facades\URL::to('/search')}}" method="POST" role="search" class="form-inline mb-2">
                    {{csrf_field()}}
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    <select name="filter" id="filter">
                        <option value="auteur">auteur</option>
                        <option value="titel">titel</option>
                        <option value="desc">inhoud</option>
                    </select>
                </form>
                <h2>boeken:</h2>
                @if(isset($message))
                    <p>{{$message}}</p>
                    @endif
                <ul class="list-group" style="max-height: 400px; overflow-y: scroll">
                    @if(isset($details))
                        <p>Gevonden resultaten voor "{{$query}}" in "{{$filter}}":</p>
                        @foreach($details as $book)
                            <li class="list-group-item text-left p-1 d-flex"><span><img src="https://via.placeholder.com/50x50" alt="" class="pr-2"></span>{{$book->titel}}
                                <span class="ml-5">{{$book->auteur}}</span>
                                @if (Auth::check() && $user->role_id == 2)
                                    @if($book->rented_id == 0) <button class="btn-success ml-auto btn-sm bookSubmit" data-id="{{$book->id}}">leen</button>@else<p class="ml-auto text-danger">&nbsp;ontleend tot {{$book->return_date}}</p>@endif
                                @elseif($book->rented_id != 0)
                                    <p class="ml-auto text-danger">&nbsp;ontleend tot {{$book->return_date}}</p>
                                @endif

                            </li>
                        @endforeach
                        @else
                    @foreach($books as $book)
                        <li class="list-group-item text-left p-1 d-flex">
                            <form action="{{URL::to('/rent')}}" method="POST"><input type="text" value="{{$book->id}}" name="book" hidden>
                                <span><img src="https://via.placeholder.com/50x50" alt="" class="pr-2"></span>{{$book->titel}}
                                <span class="ml-5">{{$book->auteur}}</span>
                                @if (Auth::check() && $user->role_id == 2)
                                    @if($book->rented_id == 0) <button class="btn-success ml-auto btn-sm bookSubmit" data-id="{{$book->id}}">leen</button>@else<p class="ml-auto">&nbsp;ontleend tot {{$book->return_date}}</p>@endif
                                @elseif($book->rented_id != 0)
                                    <p class="ml-auto text-danger">&nbsp;ontleend tot {{$book->return_date}}</p>
                                @endif
                            </form>

                        </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
