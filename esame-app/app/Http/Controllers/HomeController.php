<?php
    

    use Illuminate\Routing\Controller;
    use Illuminate\Http\Request;
    use App\Models\Client;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;

    class HomeController extends Controller{
        public function index(){
        return view('home');
    }

    public function news(){
        $json=Http::get('http://api.mediastack.com/v1/news',[
            'languages'=>'it',
            'keywords'=>'videogiochi',
            'limit'=> 10,
            'access_key'=>'54880d037589849d206b7dac528c9dfd'
        ]);

        $newJson=array();
        for($i=0;$i<count($json['data']);$i++){
            $newJson[]=array('title'=>$json['data'][$i]['title'],'url'=>$json['data'][$i]['url']);
        }
        return response()->json($newJson);
    }
        
    }
?>