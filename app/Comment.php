<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
	public $table = "comments";

	public function users(){
		return $this->belongsTo('App\User','comment_id');
	}

	public function images(){
		return $this->belongsTo('App\Image','comment_id');
	}
}

 ?>