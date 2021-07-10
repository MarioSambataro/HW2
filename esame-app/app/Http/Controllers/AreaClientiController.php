<?php
    

    use Illuminate\Routing\Controller;
    use Illuminate\Http\Request;
    use App\Models\Client;
    use App\Models\gioco;
    use App\Models\preferiti;
    use App\Models\acquistato;
    use App\Models\carrello;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;

    class AreaClientiController extends Controller{
        public function index(){
            if(session('user_id')!=null)
                return view('AreaClienti');
            else
        return redirect('login');
    }
    public function giochi(){

        //carico i giochi
        
          $giochi = gioco::join('prodotto','prodotto.id','=','gioco.id')->get();
          return $giochi;
  

    }
    public function pref(){

        //carico preferiti
  
        $session_id = Session::get('user_id');
          
          $preferiti=preferiti::join('gioco','gioco.id','=','preferiti.id')->where('preferiti.nome',$session_id)->get();
          return $preferiti;
  
        }

        public function caricaAcquisti(){

            $session_id = Session::get('user_id');
              
              $acquisti=acquistato::join('gioco','gioco.id','=','acquistato.id')->where('acquistato.nome',$session_id)->get();
              return $acquisti;
      
            }

        public function caricaCarrello(){
            $session_id = Session::get('user_id');
            $carrello=carrello::join('gioco','gioco.id','=','carrello.id')->join('prodotto',
            'prodotto.id','=','gioco.id')->where('carrello.nome',$session_id)->get(['carrello.id',
            'gioco.nome as titolo','gioco.console','gioco.immagine','gioco.descrizione','carrello.quantita','prodotto.costo']);
            return $carrello;
             }

        public function rimCarrello($id){
                $session_id = Session::get('user_id');
                $r=carrello::where('nome',$session_id)->where('id',$id)->delete();
                if($r){
                    return json_encode(['type'=>'si','response'=>'elemento rimosso dal carrello']);
                    }
            } 

        public function aggCarrello($id){
            $session_id = Session::get('user_id');
            $newPref=carrello::create([
                'nome'=>$session_id,
                'id'=>$id,
                'quantita'=>1
             ]);
             if($newPref){
                return json_encode(['type'=>'si','response'=>'elemento aggiunto dal carrello']);
                }

            } 
        public function aggiornaCarrello($q,$id){
                $session_id = Session::get('user_id');
                $a=carrello::where('nome',$session_id)->where('id',$id)->update(['quantita'=>$q]);
                if($a){
                return json_encode(['type'=>'si','response'=>'carrello aggiornato']);
                }   
        }

        public function aggPref($id){

            $session_id = Session::get('user_id');
            $newPref=preferiti::create([
               'nome'=>$session_id,
               'id'=>$id
            ]);
            if($newPref){
                return json_encode(['type'=>'si','response'=>"elemento aggiunto a preferiti."]);
            }
         }    
        public function rimPref($id){
             $session_id = Session::get('user_id');
             $r=preferiti::where('nome',$session_id)->where('id',$id)->delete();
            
             if($r){
             return json_encode(['type'=>'si','response'=>'preferito rimosso']);
             }
            }    
  

        
    }

?>