<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * Relacion con el modelo Roles
     * @return object
     */
    public function roles(){
        return $this
            ->belongsToMany('App\Role')
            ->withTimestamps();
    }
    /**
     * [authorizeRoles Verifica si el Usuario esta autorizado para]
     * @param  [array] $roles [roles de Usuario]
     * @return [type]        [description]
     */
    public function authorizeRoles($roles){
        if ($this->hasAnyRole($roles)) {
            return true;
        }
    }

    /**
     * Verifca el rol o roles de Usuario]
     * @param  array $roles
     * @return boolean
     */
    public function hasAnyRole($roles){
        if (is_Array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        }else{
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    /**
     * Consulta si el usuario tiene un rol
     * @param  string  $role [rol del usuario]
     * @return boolean
     */
    public function hasRole($role){
        if ($this->roles()->where('name', $role)->firstOrFail()) {
            return true;
        }
        return false;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
