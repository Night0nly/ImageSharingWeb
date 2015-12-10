<?php 
class Comment extends Eloquent{
	public $table = "comments";

	public function users(){
		return $this->belongsTo('App\User');
	}

	public function images(){
		return $this->belongsTo('App\Image');
	}
}

 ?>