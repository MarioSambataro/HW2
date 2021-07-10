<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class carrello extends Model{
    protected $table="carrello";
    protected $autoIncrement=false;
    public $timestamps=false;

    protected $fillable=[
        "nome", "id", "quantita"
    ];


    public function Client(){
        return $this->belongsTo('App\Models\Client','nome');
    }

    public function prodotto(){
        return $this->belongsTo('App\Models\prodotto','id');
    }

}

?>