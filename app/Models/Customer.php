<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    public function addresses(): HasMany {
        return $this->hasMany(Address::class);
    }
    public function purchaseOrders(): HasMany {
        return $this->hasMany(PurchaseOrder::class);
    }

    public function scopeSearch($query, $search) {
        return $query->where('company_name', 'like', '%' . $search . '%')
            ->orWhere('purchaser_name', 'like', '%' . $search . '%')
            ->orWhere('phone_number', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%');
    }
}
