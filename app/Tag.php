<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model{
	public $table = "tags";

	public function images(){
		return $this->belongToMany('App\Image','image_id');
	}
} ?>