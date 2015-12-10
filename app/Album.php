<?php 
class Album extends Eloquent{
	public $table = "albums";

	public function images(){
		return $this->hasMany('App\Image');
	}

	public function users(){
		return $this->belongsTo('App\User')
	}
}

 ?>