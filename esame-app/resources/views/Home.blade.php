<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>MHW3</title>
        <link rel="stylesheet" href="{{url('CSS/mhw3.css')}}"/>
        <link href='{{url("https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@357&display=swap")}}' rel="stylesheet">
        <link href='{{url("https://fonts.googleapis.com/css2?family=Oswald&display=swap")}}' rel="stylesheet">
        <link href='{{url("https://fonts.googleapis.com/css2?family=Cuprum:wght@500&display=swap")}}' rel="stylesheet">
        <script src="{{url('JS/contents.js')}}" defer></script>
        <script src="{{url('JS/mhw2.js')}}" defer></script>
        <script src="{{url('JS/mhw3.js')}}" defer></script>
    </head>

    <body>
        <header>
            <nav> 
                <img src="http://pngimg.com/uploads/mario/mario_PNG59.png" />
                <div id='barradiricerca'><input type="text" placeholder="cerca"> </div>
                <div id="links">
                    <a href="{{route('Home')}}">Home</a>
                    <a href="{{route('login')}}">Account</a>
                    <a href="{{route('contatti')}}">Contatti</a>
                </div>
                <div id="menu">
                    <h1>menu</h1>
                    <div id=listaMenu class="hidden">
                        <a href="{{route('Home')}}">Home</a>
                        <a href="{{route('login')}}">Account</a>
                        <a href="{{route('contatti')}}">Contatti</a>
                    </div>
                </div>
            </nav>
            <h1>
                <strong>scopri tutti i prodotti</strong></br>
                <a class="button" href="{{route('login')}}">SCOPRI DI PIU'</a>
            </h1>
        </header>
        <section>
            <h1>NEWS</h1>
            <div id='news'>

            </div>

        </section>

        <section id='liste'>
            <div id='preferiti' class='hidden'>
                <h1>Salva per dopo</h1> 
                <div id='lista_prodottiPref'>
                    
                </div>
            </div>
            
            <h1>BESTSELLERS</h1>
            <div id='lista_prodotti'>
                
            </div>
        </section>
            
            
    

        <footer>
            <p>Mario Gabriele Sambataro</p>
            <p>O46002017</p>
            <a href="{{route('loginD')}}">ACCESSO DIPENDENTI</a>
        </footer>
    </body>
</html>