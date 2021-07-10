<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class preferiti extends Model{
    protected $table="preferiti";
    protected $autoIncrement=false;
    public $timestamps=false;

    protected $fillable=[
        "nome", "id"
    ];

    public function Client(){
        return $this->belongsTo('App\Models\Client','nome');
    }

    public function gioco(){
        return $this->belongsTo('App\Models\gioco','id');
    }

}

?>