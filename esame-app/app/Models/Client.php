<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Client extends Model{
    //protected $table="Client";
    protected $primaryKey="cf";
    protected $autoIncrement=false;
    protected $keyType="string";
    public $timestamps=false;

    protected $fillable=[
        "cf", "nome", "password"
    ];

    public function preferiti(){
        return $this->hasMany('App\Models\preferiti','nome');
    }

    public function acquistato(){
        return $this->hasMany('App\Models\acquistato','nome');
    }
    
    public function carrello(){
        return $this->hasMany('App\Models\carrello','nome');
    }

}

?>
