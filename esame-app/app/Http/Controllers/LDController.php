<?php

    use Illuminate\Routing\Controller;
    use Illuminate\Http\Request;
    use App\Models\impiegato;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;

    class LDController extends Controller{
        public function login(){
            if(session('dip_id')!=null)
                return redirect('AreaDipendenti');
            
            else
        return view('dipendentiLogin')->with("csrf_token",csrf_token());
    }

        public function checkLogin(){
            $request=request();
            $errors=$this->logErrors($request);
            if(count($errors)==0){
            $user = impiegato::where('cf',request('username'))->first();
            
            if(isset($user)){
                //credenziali valide 
                session::put('dip_id', $user->cf);
                return redirect('AreaDipendenti');
            }
        }
    else{
        return redirect('loginD')->with('errors',$errors);
        }
    }

        private function logErrors($data){
            $error=array();
            
                $utente = impiegato::where('cf', $data['username'])->first();
                if($utente==null){
                    $error[]="CF errato";
                    return $error;
                }
                $password = $utente->password;
                if ($password!=$data['password']){
                    $error[]="Password errata.";
                }
           
            return $error;
        }

        public function logout(){
            Session::flush();
            return redirect('Home');
        }

    }
?>