<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasOne
     */
    public function teacher()
    {
        return $this->hasOne(teacher::class);
    }

    /**
     * @return HasOne
     */
    public function student()
    {
        return $this->hasOne(student::class);
    }

    /**
     * @return HasOne
     */
    public function admin()
    {
        return $this->hasOne(admin::class);
    }

    /**
     * @return HasOne
     */
    public function headResponsable()
    {
        return $this->hasOne(headResponsable::class);
    }
}
