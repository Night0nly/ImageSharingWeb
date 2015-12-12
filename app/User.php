<?php
namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    public $table = 'users';

    public function comments()
    {
        return $this->hasMany('App\Comment');
	}

    public function images()
    {
        return $this->hasMany('App\Image');
	}
    public function albums(){
        return $this->hasMany('App\Album');
	}

    protected $fillable = ['firstname','lastname','phone','birthday','introduction', 'email', 'password','username'];

    protected $hidden = ['password', 'remember_token'];
    public function setBirthdayAttribute($birthday)
    {
        $this->attributes['birthday'] = Carbon::parse($birthday)->format('Y-m-d');
    }
    public function getBirthdayAttribute(){
        return Carbon::parse($this->attributes['birthday'])->format('d-m-Y');
    }
}

