<?php
    

    use Illuminate\Routing\Controller;
    use Illuminate\Http\Request;
    use App\Models\Client;
    use App\Models\gioco;
    use App\Models\copia;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;

    class AreaDipendentiController extends Controller{
        public function index(){
            if(session('dip_id')!=null)
                return view('AreaDipendenti');
            else
        return redirect('loginD');
    }

    public function magazzino(){
        $magazzino=gioco::join('copia','gioco.id','=','copia.gioco')->get();
        return $magazzino;
    }



}
?>