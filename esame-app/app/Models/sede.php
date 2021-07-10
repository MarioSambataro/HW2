<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class sede extends Model{
    protected $table="sede";
    protected $autoIncrement=false;

    protected $fillable=[
        "codice", "negozio", "citta"
    ];

    public function negozio(){
        return $this->belongsTo('App\Models\sede','codice');
    }

    

}

?>