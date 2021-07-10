<?php
    

    use Illuminate\Routing\Controller;
    use Illuminate\Http\Request;
    use App\Models\Client;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;

    class prodottiController extends Controller{
        public function index(){
        return view('prodotti')->with("csrf_token",csrf_token());;
    }

    public function prodCostosi(){
        $prod=DB::select("CALL P1()");
        return $prod;
    }

    public function sconto(){
        $codice=request('idGioco');
        DB::select("CALL P3('$codice')");
        return view('prodotti')
        ->with('csrf_token',csrf_token());

    }

        
    }
?>