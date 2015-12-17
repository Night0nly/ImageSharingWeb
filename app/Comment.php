<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
	public $table = "comments";

	public function users(){
		return $this->belongsTo('App\User');
	}

	public function image(){
		return $this->belongsTo('App\Image');
	}
	protected $fillable = ['user_id','image_id','comment','guestName'];

}

 ?>