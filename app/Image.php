<?php 
class Image extends Eloquent{
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

}

 ?>