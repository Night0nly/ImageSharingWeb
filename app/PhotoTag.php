<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class PhotoTag extends Model{
    public $table = "phototags";

    protected $fillable = ['image_id','tag_id'];
} ?>