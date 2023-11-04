<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Delivery extends Model
{
    use HasFactory;

    public function saleOrder(): BelongsTo
    {
        return $this->belongsTo(SaleOrder::class);
    }



    public function scopeSearch($query, $search)
    {
        return $query->where('id', 'like', '%' . $search . '%')
            ->orWhereHas('saleOrder', function ($soQuery) use ($search) {
                $soQuery->where('id', 'like', '%' . $search . '%')
                    ->orWhereHas('purchaseOrder', function ($poQuery) use ($search) {
                        $poQuery->where('id', 'like', '%' . $search . '%')
                            ->orWhereHas('customer', function ($customerQuery) use ($search) {
                                $customerQuery->where('id', 'like', '%' . $search . '%')
                                    ->orWhere('company_name', 'like', '%' . $search . '%');
                            });
                    });
            });
    }
}
