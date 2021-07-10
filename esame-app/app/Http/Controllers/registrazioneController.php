<?php

    use Illuminate\Routing\Controller;
    use Illuminate\Http\Request;
    use App\Models\Client;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;

    class registrazioneController extends Controller{
        public function index(){
            if(session('user_id')!=null)
                return redirect('AreaClienti');
            
            else
        return view('signup')->with("csrf_token",csrf_token());
    }

    protected function registrazione(){

        $request=request();
        $errors=$this->countErrors($request);
        if(count($errors) === 0){

            $pswd=Hash::make($request['password'],['rounds'=>12]);

            $newUser = Client::create([
                'cf' => $request['cf'],
                'nome'=> $request['username'],
                'password'=> $pswd
            ]);

            if($newUser){
                return redirect('login');
            }
        }

           
            else{
                return redirect('signup')->with('errors',$errors); //non sono riuscito a creare nuovo utente
            }
        
    }

    private function countErrors($dati){

        $error = array();

        //username
        $c1=Client::where('nome',$dati['username'])->first(); //faccio il primo controllo sull'username
        if($c1!==null)
            $error[]="Username non valido";
    
        //codice fiscale
        $c2= Client::where('cf',$dati['cf'])->first();
        if($c2 !== null)
            $error[]="Codice fiscale già in uso";

        //password
        if(strlen($dati['password']) < 8)
            $error[]="Caratteri password insufficienti";

        //conferma password
        if(strcmp($dati['password'],$dati['confirm_password']) != 0)
            $error[]="Le password non coincidono";

        return $error;
    }

    }
?>