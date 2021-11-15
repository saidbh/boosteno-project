<?php

namespace App\Models;

use App\Models\Contacts;
use App\Models\UserRole;
use App\Models\Employees;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'created_at';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'email',
        'phone',
        'password',
        'remember_token',
        'email_verified_at',
        'archived',
        'activated',
        'blocked',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    public function userRole()
    {
        return $this->hasOne(UserRole::class, 'users_id', 'id');
    }

    public function contact()
    {
        return $this->belongsTo(Contacts::class, 'id', 'users_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employees::class, 'id', 'users_id');
    }

    public function third()
    {
        return $this->belongsTo(Thirds::class, 'id', 'users_id');
    }

    public function isClient()
    {
        
    }

    public function isEmployee()
    {
        
    }
}
