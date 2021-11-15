<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thirds extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'thirds';

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
        'users_id',
        'thirds_type_id',
        'categories_type_id',
        'code_client',
        'code_supplier',
        'name',
        'alter_name',
        'address_line',
        'gender',
        'birthday',
        'phone',
        'email',
        'city',
        'region',
        'zip_code',
        'country',
        'tax_number',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(CategoriesType::class, 'categories_type_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(ThirdsType::class,'thirds_type_id','id');
    }

    public function agency()
    {
        return $this->belongsTo(Agencies::class,'agencies_id','id');
    }

    public function department()
    {
        return $this->belongsTo(Departments::class,'departments_id','id');
    }
}
