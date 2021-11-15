<?php

namespace App\Models;

use App\Models\Thirds;
use App\Models\Contacts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clients extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'contacts_id',
        'thirds_id',
    ];

    public function third()
    {
        return $this->hasOne(Thirds::class, 'id', 'thirds_id');
    }

    public function contact()
    {
        return $this->hasOne(Contacts::class, 'id', 'contacts_id');
    }

    
}
