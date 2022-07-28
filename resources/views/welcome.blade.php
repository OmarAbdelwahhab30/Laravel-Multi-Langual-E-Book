<!DOCTYPE html>
<html lang="{{App::getLocale()}}" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>E-Book</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            html, body {
                background-color: #fff;
                color: #ffffff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                color: #ffffff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            body {
                background-image: url(https://static.vecteezy.com/system/resources/previews/001/987/497/original/abstract-stripes-golden-lines-diagonal-overlap-on-black-background-luxury-stryle-free-vector.jpg);
                background-repeat: no-repeat;
                background-size: cover;
            }

            .test{
                color:#ffffff;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth

                            <a href="{{route('main.index')}}" class="test">
                                {{__("welcome.Go To Administration Dashboard")}}
                            </a>
                            <a href="{{route("user.home")}}">
                                {{__("welcome.Start Exploring Library")}}
                            </a>
                        <form method="post" action="{{route("logout")}}">
                          @csrf
                            <button style="margin-left: 489px; background-color: black; font-size: 18px;" type="submit">{{__("welcome.Logout")}}</button>
                        </form>

                    @else
                        <a href="{{ route('login') }}">{{__("welcome.Login")}}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{__("welcome.Register")}}</a>
                        @endif

                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    E-Book
                </div>
                <div class="links">
                    <a href="https://www.youtube.com/channel/UCbwxGvgbPxvqBSIhxx-IYzw">{{__("welcome.YouTube")}}</a>
                    <a href="https://github.com/OmarAbdelwahhab30">{{__("welcome.GitHub")}}</a>
                    <a href="https://www.hackerrank.com/mrmr14934?hr_r=1">{{__("welcome.Hackerrank")}}</a>
                    <a href="https://www.facebook.com/profile.php?id=100009865058513">{{__("welcome.Facebook")}}</a>
                </div>
                <div class="links" >

                </div>
            </div>
        </div>
    </body>
</html>
