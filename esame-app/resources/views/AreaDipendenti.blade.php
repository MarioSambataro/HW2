<!DOCTYPE html>
<html>
    <head>
       
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>AREA-DIPENDENTI</title>
        <link rel="stylesheet" href="{{url('CSS/area_dipendenti.css')}}"/>
        <link href='{{url("https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@357&display=swap")}}' rel="stylesheet">
        <link href='{{url("https://fonts.googleapis.com/css2?family=Oswald&display=swap")}}' rel="stylesheet">
        <link href='{{url("https://fonts.googleapis.com/css2?family=Cuprum:wght@500&display=swap")}}' rel="stylesheet">
        <script src="{{url('JS/area_dipendenti.js')}}" defer></script>
    </head>

    <body>
        <header>
            <nav> 
                <img src="http://pngimg.com/uploads/mario/mario_PNG59.png" />
                <div id="links">
                    <a href="{{route('Home')}}">Home</a>
                    <a id='menu1'>MENU</a>
                    <a href="{{route('logoutD')}}">LOGOUT</a>  
                </div>
                <div id="menu">
                    <div></div>
                    <div></div>                    
                    <div></div>
                </div>
            </nav>
            <div id='MENU' class='hidden'>
            <a href="{{route('prodotti')}}">Gestisci Sconti</a>
            <a href="{{route('dipendenti')}}">info Dipendenti</a>
            </div>
        </header>
        
    <section id='Mag'>
        <h1>AREA DIPENDENTI</h1>

      <div id='tab'>

        <h1>MAGAZZINO</h1>
        <input type="text" id="ricerca"  onkeyup="cerca()" name="ricerca" placeholder="inserisci titolo"><br/><br/>   

        <table id="magazzino">
        <tr>
        <th>Titolo</th>
        <th>Console</th>
        <th>ID</th>
        <th>Codice copia</th>
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