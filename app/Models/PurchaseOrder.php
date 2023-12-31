<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use HasFactory, SoftDeletes;
    public function customer(): BelongsTo {
        return $this->belongsTo(Customer::class);
    }

    public function poItems(): HasMany{
        return $this->hasMany(PoItem::class);
    }

    public function saleOrders(): HasMany{
        return $this->hasMany(SaleOrder::class);
    }

    public function receipt(): HasOne
    {
        return $this->hasOne(Receipt::class);
    }

    public function invoice(): HasOne
    {
        return $this->hasOne(Invoice::class);
    }

    public function address(): HasOne {
        return $this->Hasone(Address::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('id', 'like', '%' . $search . '%')
                ->orWhereHas('customer', function ($customerQuery) use ($search) {
                    $customerQuery->where('company_name', 'like', '%' . $search . '%')
                                ->orWhere('id', 'like', '%' . $search . '%');
                });
        });
    }
    

}

