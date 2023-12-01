<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'service_orders';

    protected $fillable = [
        'vehiclePlate',
        'entryDateTime',
        'exitDateTime',
        'priceType',
        'price',
        'userId',
    ];

    protected $dates = [
        'entryDateTime',
        'exitDateTime',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
