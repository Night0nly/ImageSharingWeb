<?php 
class Album extends Eloquent{
	public $table = "albums";

	public function images(){
		return $this->hasMany('App\Image','album_id');
	}

	public function users(){
		return $this->belongsTo('App\User','album_id')
	}
}

 ?>