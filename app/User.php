<?php 
class User extends Eloquent{
	public $table = "users";

	public function comments(){
		return this->hasMany('App\Comment');
	}

	public function images(){
		return this->hasMany('App\Image');
	}

<<<<<<< HEAD
	public function albums(){
		return this->hasMany('App\Album');
	}
=======
class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname','lastname','phone','birthday','introduction', 'email', 'password','username'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
>>>>>>> 94c28365c640561dda40064fbab2fc4cd18a99ab
}
?>