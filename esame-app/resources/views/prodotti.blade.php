<!DOCTYPE html>
<html>
    <head>
       
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>AREA-DIPENDENTI</title>
        <link rel="stylesheet" href="{{url('CSS/prodotti.css')}}"/>
        <link href='{{url("https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@357&display=swap")}}' rel="stylesheet">
        <link href='{{url("https://fonts.googleapis.com/css2?family=Oswald&display=swap")}}' rel="stylesheet">
        <link href='{{url("https://fonts.googleapis.com/css2?family=Cuprum:wght@500&display=swap")}}' rel="stylesheet">
        <script src="{{url('JS/prodotti.js')}}" defer></script>
    </head>

    <body>
        <header>
            <nav> 
                <img src="http://pngimg.com/uploads/mario/mario_PNG59.png" />
                
                <div id="links">
                    <a href="{{route('AreaDipendenti')}}">indietro</a>
                    <a href="{{route('logoutD')}}">LOGOUT</a>   
                </div>
                <div id="menu">
                    <div></div>
                    <div></div>                    
                    <div></div>
                </div>
            </nav>
        </header>


        <section id='Prod'>
    <div class='cubo'>
        <h1>Prodotti più costosi</h1>
        <div id="prodCost">
        <h2>codici delle copie</h2>
        </div>
    </div>

        <div class='cubo'>
        <h1>SCONTI</h1>
        <form name='sconto' method='post'>
        <input type="hidden" name="_token" value="{{$csrf_token}}">
                    <div class="idGioco">
                    <div><input type='text' name='idGioco' placeholder="idGioco"><div>
                    </div>
                    <div class="submit">
                    <input type='submit' value="applica Sconto" id="submit">
                    </div>
            </form>
            <p>INSERISCI L’ID DI UN PRODOTTO PER APPLICARE UNO SCONTO DEL 15% SE IL PRODOTTO COSTA DAI 40 AI 70 EURO O DEL 30% SE SUPERIORE AI 70 EURO</p>
        </div>
        </section>

        <footer>
            <p>Mario Gabriele Sambataro</p>
            <p>O46002017</p>
        </footer>
    </body>
</html>