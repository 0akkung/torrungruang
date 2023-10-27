<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaleOrder extends Model
{
    use HasFactory, SoftDeletes;

    public function delivery(): HasOne
    {
        return $this->hasOne(Delivery::class);
    }
    public function purchaseOrder(): BelongsTo
    {
    return $this->belongsTo(PurchaseOrder::class);
    }
    public function soItems(): HasMany{
        return $this->hasMany(SoItem::class);
    }
    
}
