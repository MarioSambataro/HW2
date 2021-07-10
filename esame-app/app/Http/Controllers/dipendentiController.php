<?php
    

    use Illuminate\Routing\Controller;
    use Illuminate\Http\Request;
    use App\Models\Client;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;

    class dipendentiController extends Controller{
        public function index(){
        return view('dipendenti');
    }

    public function stipMedio(){
        $stipM=DB::select("CALL P4()");
        return $stipM; //fare controlli
    }

    public function impiego($sede){
        $imp=DB::select("CALL P2('$sede')");
        return $imp; //fare controlli
    }
        
    }
?>