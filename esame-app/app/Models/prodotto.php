<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class prodotto extends Model{
    protected $table="prodotto";
    protected $autoIncrement=false;

    protected $fillable=[
        "id", "costo"
    ];

    public function acquistato(){
        return $this->hasMany('App\Models\acquistato','nome');
    }

    

}

?>