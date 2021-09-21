<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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
                color: #636b6f;
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
               <!--
                <div class="links">
                    <a href="{{route('a',55)}}">a</a><!--يدلي في صفحه 55 aاول ما اضغط علي route
                    <a href="{{route('b')}}">b</a><!--web.php لازم تكتب المسار حق الصفحه من صفحه  route
                </div>
                -->

                <h1> {{__('messages.welcom')}}</h1>


               <!-- <p>$string age</p>--><!--تبع طريقه الاوله-->
               
                <!-- <p>{{$name}} -- {{$id}}</p>تبع الطريقه الثانيه -->
                
                <!-- <p>$obj -> name  $obj -> id</p> --><!--تبع الطريقه الثالثه-->


               @if($name == 'Bashar')
                  <p>Yes Iam Bashar</p>
               @else
                  <p>No Iam Bashar</p>
               @endif
               
            </div>
        </div>
    </body>
</html>
