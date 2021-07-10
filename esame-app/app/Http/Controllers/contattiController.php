<?php
    

    use Illuminate\Routing\Controller;
    use Illuminate\Http\Request;
    use App\Models\Client;
    use App\Models\negozi;
    use App\Models\sede;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;

    class contattiController extends Controller{
        public function index(){
        return view('contatti');
    }

       public function contatti(){
            $contatti= negozi::join('sede','sede.codice','=','negozi.id_negozio')->get(['sede.citta','negozi.telefono','negozi.indirizzo']);
            return $contatti;
        }
       
        
    }
?>