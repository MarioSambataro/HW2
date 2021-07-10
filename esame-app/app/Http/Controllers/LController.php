<?php

    use Illuminate\Routing\Controller;
    use Illuminate\Http\Request;
    use App\Models\Client;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;

    class LController extends Controller{
        public function login(){
            if(session('user_id')!=null)
                return redirect('AreaClienti');
            
            else
        return view('login')->with("csrf_token",csrf_token());
    }

        public function checkLogin(){
            $request=request();
            $errors=$this->logErrors($request);
            if(count($errors)==0){
            $user = Client::where('nome',request('username'))->first(); //siamo sicuri che username e pass sono corretti
            
            if(isset($user)){
                //credenziali valide 
                session::put('user_id', $user->nome);
                return redirect('AreaClienti');
            }
        }
        else{
        return redirect('login')->with('errors',$errors);
        }
    }

        private function logErrors($data){
            $error=array();
        
                $user = Client::where('nome', $data['username'])->first();
                if($user==null){
                    $error[]="Nome utente errato";
                    return $error;
                }
                $password = $user->password;
                if (!(Hash::check($data['password'], $password))){
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