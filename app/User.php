<?php 
class User extends Eloquent{
	public $table = "users";

	public function comments(){
		return this->hasMany('App\Comment');
	}

	public function images(){
		return this->hasMany('App\Image');
	}

	public function albums(){
		return this->hasMany('App\Album');
	}
}
?>