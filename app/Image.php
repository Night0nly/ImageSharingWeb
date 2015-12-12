<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Image extends Model{
    public $table = "images";

    public function users(){
        return $this->belongsTo('App\User');
    }
    public function albums(){
        return $this->belongsTo('Appp\Album');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    protected $fillable = ['title','caption','vote_count','url_path'];
}
?>