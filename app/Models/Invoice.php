<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;
    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }
    public function scopeSearch($query, $search)
    {
        return $query->where('id', 'like', '%' . $search . '%')
            ->orWhereHas('purchaseOrder', function ($poQuery) use ($search) {
                $poQuery->where('id', 'like', '%' . $search . '%')
                    ->orWhereHas('customer', function ($customerQuery) use ($search) {
                        $customerQuery->where('company_name', 'like', '%' . $search . '%')
                                    ->orWhere('id', 'like', '%' . $search . '%');
                    });
            });
    }
}
