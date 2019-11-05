<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

  public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function roles()
  {
      return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
  }


  public function hasAnyRole($roles)
  {
      if(is_array($roles))
      {
          foreach ($roles as $role)
          {
              if($this->hasRole($role))
              {
                  return true;
              }
          }
      }
      else
      {
          if($this->hasRole($roles))
          {
              return true;
          }
      }
  }

  public function hasRole($role)
  {
      if($this->roles()->where('name', $role)->first())
      {
          return true;
      }

      return false;
  }



    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




}
