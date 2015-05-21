<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Student extends Model implements AuthenticatableContract, CanResetPasswordContract{

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];

    public function detail()
    {
        return $this->hasOne('App\StudentDetail');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getAuthPassword()
    {
        return '';
    }

    public function getAuthIdentifier()
    {
        return '';
    }

    public function getEmailForPasswordReset()
    {
        return '';
    }
}
