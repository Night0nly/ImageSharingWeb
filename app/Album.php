<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model{
	public $table = "albums";

	public function images(){
		return $this->hasMany('App\Image','album_id');
	}

	public function users(){
		return $this->belongsTo('App\User','album_id');
	}
}

 ?>