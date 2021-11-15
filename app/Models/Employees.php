<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employees';

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
     * @var array
     */
    protected $fillable = [
        'id',
        'users_id ',
        'employee_type_id',
        'agencies_id',
        'departments_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'gender',
        'birthday',
        'city',
        'region',
        'zip_code',
        'country',
        'level',
        'created_at',
        'updated_at',
    ];

    public function teacher()
    {
        return $this->hasOne(Teachers::class,'employees_id','id');
    }

    public function agency()
    {
        return $this->belongsTo(Agencies::class,'agencies_id','id');
    }

    public function department()
    {
        return $this->belongsTo(Departments::class,'departments_id','id');
    }
    public function type()
    {
        return $this->belongsTo(employees_type::class,'employees_type_id','id');
    }
}
