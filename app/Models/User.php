<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'ic_no',
        'email',
        'password',
        'picture',
        'role', 
        'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->role == 'admin';
    }

    public function isClient()
    {
        return $this->role == 'client';
    }


    //One user can create many companies
    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    //one user can add many products
    public function products() 
    {
        return $this->hasMany(Product::class);
    }

    //one user can generate one invoice
    public function invoices() 
    {
        return $this->hasMany(Invoice::class);
    }

    //one user can add many payment methods
    public function paymethods()
    {
        return $this->hasMany(Paymethod::class);
    }
}
