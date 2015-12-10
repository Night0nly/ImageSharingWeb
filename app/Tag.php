<?php 
class Tag extends Eloquent{
	public $table = "tags";

	public function images(){
		return $this->belongToMany('App\Image','image_id');
	}
} ?>