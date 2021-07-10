<html>
    <head>
       
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>AREA-DIPENDENTI</title>
        <link rel="stylesheet" href="{{url('CSS/dipendenti.css')}}"/>
        <link href='{{url("https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@357&display=swap")}}' rel="stylesheet">
        <link href='{{url("https://fonts.googleapis.com/css2?family=Oswald&display=swap")}}' rel="stylesheet">
        <link href='{{url("https://fonts.googleapis.com/css2?family=Cuprum:wght@500&display=swap")}}' rel="stylesheet">
        <script src="{{url('JS/dipendenti.js')}}" defer></script>
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
        <section id='Dip'>
        <div class='cubo'>
        <h1>impieghi sedi</h1>
        
        <form name='cercaSede' method='post' id='form'>
                    <div class="sede">
                    <div><input type='text' name='sede' placeholder="inserisci sede"></div>
                    </div>
                    <div class="submit">
                    <input type='submit' value="Cerca impieghi" id="submit">
                    </div>
            </form>
            <table id="impiegati">
        <tr>
            <th>CF</th>
        <th>Nome</th>
        <th>lavora</th>
        <th>Inizio Impiego</th>
        <th>Fine Impiego</th>
        </tr>
        </table>
        </div>

            <div class='cubo'>
                <h1>STIPENDIO MEDIO MENSILE PER ETA'</h1>
                
        <table id="media">
        <tr>
        <th>Età</th>
        <th>stipendio medio</th>
        </tr>

        </table>
            </div>
        </section>
        <footer>
            <p>Mario Gabriele Sambataro</p>
            <p>O46002017</p>
        </footer>
    </body>
</html>