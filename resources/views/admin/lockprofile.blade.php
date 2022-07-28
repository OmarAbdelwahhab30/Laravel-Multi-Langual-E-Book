<!DOCTYPE html>
<html lang="{{App::getLocale()}}" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-Book</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <style>
        /* Importing fonts from Google */

        /* Reseting */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #ecf0f3;
        }

        .wrapper {
            max-width: 350px;
            min-height: 500px;
            margin: 80px auto;
            padding: 40px 30px 30px 30px;
            background-color: #ecf0f3;
            border-radius: 15px;
            box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
        }

        .logo {
            width: 80px;
            margin: auto;
        }

        .logo img {
            width: 100%;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0px 0px 3px #5f5f5f,
            0px 0px 0px 5px #ecf0f3,
            8px 8px 15px #a7aaa7,
            -8px -8px 15px #fff;
        }

        .wrapper .name {
            font-weight: 300;
            font-size: 25px;
            color: #555;
        }

        .wrapper .form-field input {
            width: 100%;
            display: block;
            border: none;
            outline: none;
            background: none;
            font-size: 1.2rem;
            color: #666;
            padding: 10px 15px 10px 10px;
            /* border: 1px solid red; */
        }

        .wrapper .form-field {
            padding-left: 10px;
            margin-bottom: 20px;
            border-radius: 20px;
            box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
        }

        .wrapper .form-field .fas {
            color: #555;
        }

        .wrapper .btn {
            box-shadow: none;
            width: 100%;
            height: 40px;
            background-color: #000b16;
            color: #fff;
            border-radius: 25px;
            box-shadow: 3px 3px 3px #b1b1b1,
            -3px -3px 3px #fff;
            letter-spacing: 1.3px;
        }
        .wrapper .btnn {
            box-shadow: none;
            width: 100%;
            height: 40px;
            color: #fff;
            border-radius: 25px;
            box-shadow: 3px 3px 3px #b1b1b1,
            -3px -3px 3px #fff;
            letter-spacing: 1.3px;
        }

        .wrapper .btn:hover {
            background-color: #000b16;
            cursor: pointer;
        }

        .wrapper a {
            text-decoration: none;
            font-size: 0.8rem;
            color: #000b16;
        }

        .wrapper a:hover {
            color: #000b16;
        }

        @media(max-width: 380px) {
            .wrapper {
                margin: 30px 20px;
                padding: 40px 15px 15px 15px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    @include("bootstrapHelper.alerts")
</div>
<div class="wrapper">
    <div class="logo">
        <img src="{{asset("storage/UsersImages/".Auth::user()->img)}}" width="20px" height="20px" alt="">
    </div>
    <div class="text-center mt-4 name">
        {{Auth::user()->username}}
    </div>
    <div class="text-center mt-4 name">
        {{Auth::user()->phone}}
    </div>
    <hr>
    <div class="text-center mt-4 name">
        {{__("adminlock.locked")}}
    </div>
    <form class="p mt" method="post" action="{{route("lock.imp")}}">
        @csrf
        <div class="form-field d-flex align-items-center">
            <input type="password" name="password" id="pwd" placeholder="{{__("adminlock.password")}}">
        </div>
        <button class="btn mt-3" type="submit">{{__("adminlock.Login")}}</button>
    </form>
    <form class="p mt" method="post" action="{{route("logout")}}">
        @csrf
        <button class="btnn text-dark mt-3" type="submit">{{__("adminlock.logout")}}</button>
    </form>
</div>
</body>
</html>
