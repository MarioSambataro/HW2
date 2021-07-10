<html>
    <head>   
        <link href='{{url("https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@357&display=swap")}}' rel="stylesheet">
        <link href='{{url("https://fonts.googleapis.com/css2?family=Oswald&display=swap")}}' rel="stylesheet">
        <link href='{{url("https://fonts.googleapis.com/css2?family=Cuprum:wght@500&display=swap")}}' rel="stylesheet">
        <script src="{{url('JS/signup.js')}}" defer></script>
        <link rel="stylesheet" href="{{url('CSS/signup.css')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Iscriviti</title>
    </head>
    <body>
         <section class = "iscrizione">
         <h1>Registrati!</h1>      
            <form id='iscrizione' name='iscrizione' method='post' enctype="multipart/form-data" autocomplete="off">
            <span>
              @if($errors !="[]")
                  @foreach($errors as $error)
                  {{$error}}
                  @endforeach
              @endif
            </span>  
            <input type='hidden' name = '_token' value='{{ $csrf_token }}'>
            
                <div class="username">
                    <div><input type='text' name='username' placeholder="username"></div>
                   
                </div>
                <div class="cf">
                        <div><input type='text' name='cf' placeholder="cf"></div>
                    </div>
               
                <div class="password">
                    <div><input type='password' name='password' placeholder="password" ></div>
                    
                </div>
                <div class="conferma_password">
                    <div><input type='password' name='confirm_password' placeholder="conferma password"></div>
                    
                </div>
               
                <div id="button">
                    <input type='submit' value="Registrati" id="submit">
                </div>
            </form>
            <div class="account">Hai gia' un account? </br><a href="{{route('login')}}">Accedi</a>
            </section>
    </body>
</html>