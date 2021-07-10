<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class impiegato extends Model{
    protected $table="impiegato";
    protected $autoIncrement=false;

    protected $fillable=[
        "cf", "nome", "stipedio_m","stipendio_a","eta","password"
    ];

    public function assunzione(){
        return $this->hasMany('App\Models\assunzione','inizio_imp','sede','negozio');
    }

}

?>