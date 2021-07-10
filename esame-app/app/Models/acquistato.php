<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class acquistato extends Model{
    protected $table="acquistato";
    protected $autoIncrement=false;
    

    protected $fillable=[
        "nome", "id"
    ];

    public function Client(){
        return $this->belongsTo('App\Models\Client','nome');
    }

    public function prodotto(){
        return $this->belongsTo('App\Models\prodotto','id');
    }

}

?>