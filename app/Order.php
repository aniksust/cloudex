<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($id)
 */
class Order extends Model
{
    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var string
     */
    protected $table = 'orders';

    /**
     * @var array
     */
    protected $fillable = [
        'purchasedgoods_id',
        'shipment-status'
    ];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchasedgoods()
    {
        return $this->hasMany(Purchasedgoods::class);
    }


}
