<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class copia extends Model{
    protected $table="copia";
    protected $autoIncrement=false;
    
    protected $fillable=[
        "codice", "gioco"
    ];
    public function preferiti(){
        return $this->hasMany('App\Models\gioco','id');
    }

}

?>