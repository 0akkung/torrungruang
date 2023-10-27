<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;
    public function customer(): BelongsTo{
        return $this->belongsTo(Customer::class);
    }
    public function purchase_orders(): BelongsToMany {
        return $this->belongsToMany(PurchaseOrder::class);
    }
}
