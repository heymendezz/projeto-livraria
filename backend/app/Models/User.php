<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    /**
     * Remove the "created_at" and "updated_at" columns
     * from this database model.
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'cpf',
        'email',
        'address',
        'cep'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password_hash'
    ];

    /**
     * Encrypts and sets the password hash for this user.
     */
    public function setPassword($value)
    {
        $this->attributes['password_hash'] = bcrypt($value);
    }

    /**
     * Sets the permission level for this user.
     */
    public function setPermissions($value)
    {
        $this->attributes['permissions'] = $value;
    }
}
