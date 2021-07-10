<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class assunzione extends Model{
    protected $table="assunzione";
    protected $autoIncrement=false;
    
    protected $fillable=[
        "sede", "negozio", "impiegato","tipo","inizio_imp","fine_imp"
    ];

    public function sede(){
        return $this->hasOne('App\Models\sede','codice');
    }
    public function impiegato(){
        return $this->hasOne('App\Models\impiegato','cf');
    }
    public function negozio(){
        return $this->hasOne('App\Models\negozio','id_negozio');
    }

}

?>