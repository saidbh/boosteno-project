<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class levels extends Model
{
    use HasFactory;

    /* The table associated with the model.
    *
    * @var string
    */
   protected $table = 'levels';

   /**
    * Indicates if the model should be timestamped.
    *
    * @var bool
    */
   public $timestamps = TRUE;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'id',
       'levels_types_id',
       'name',
       'description'
   ];

   public function levelsType(){
       return $this->belongsTo(levels_type::class,'levels_types_id' ,'id' );
   }
}
