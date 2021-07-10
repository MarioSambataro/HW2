<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class negozi extends Model{
    protected $table="negozi";
    protected $autoIncrement=false;

    protected $fillable=[
        "id_negozio", "telefono", "indirizzo"
    ];

    public function sede(){
        return $this->hasMany('App\Models\sede','codice');
    }

}

?>