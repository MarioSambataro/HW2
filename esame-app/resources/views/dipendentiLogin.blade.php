<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='{{url("https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@357&display=swap")}}' rel="stylesheet">
    <link href='{{url("https://fonts.googleapis.com/css2?family=Oswald&display=swap")}}' rel="stylesheet">
    <link rel="stylesheet" href="{{url('CSS/login.css')}}"/>
    <script src="{{url('JS/login.js')}}" defer></script>
    
        <title>AREA DIPENDENTI- Accedi</title>
    </head>
    <body>
        <main class="login">
        <section class="main_left">
        </section>
        <section class="main_right">
            <h1>ACCESSO DIPENDENTI</h1>
            
            <form id='login' name='login' method='post'>
            @if($errors !="[]")
                  @foreach($errors as $error)
                  {{$error}}
                  @endforeach
              @endif
            <input type='hidden' name = '_token' value='{{ $csrf_token }}'>
                <div class="username">
                    <div><input type='text' name='username' placeholder="CF"></div>
                </div>
                <div class="password">
                    <div><input type='password' name='password' placeholder="Password" ></div>
                </div>
                <div id='button'>
                    <input type='submit' value="Accedi">
                </div>
            </form>
        </section>
        </main>
    </body>
</html>