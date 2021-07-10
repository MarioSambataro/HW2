<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class gioco extends Model{
    protected $table="gioco";
    protected $autoIncrement=false;

    protected $fillable=[
        "id", "nome", "console","immagine","descrizione"
    ];

    public function preferiti(){
        return $this->hasMany('App\Models\preferiti','id');
    }

    

}

?>