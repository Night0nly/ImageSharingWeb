<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model{
    public $table = "votes";

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function image(){
        return $this->belongsTo('App\Image');
    }
    protected $fillable = ['user_id','image_id'];

}

?>