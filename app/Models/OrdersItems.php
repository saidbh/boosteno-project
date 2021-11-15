<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersItems extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders_items';

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
        'orders_id',
        'products_id',
        'invoices_id',
        'estimates_id',
        'code_product',
        'name',
        'description',
        'quantity',
        'units_id',
        'price',
        'discount_type',
        'discount',
        'taxes_id',
        'details',
    ];
}
