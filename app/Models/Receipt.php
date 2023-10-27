<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Receipt extends Model
{
    use HasFactory, SoftDeletes;
    public function purchaseOrder(): BelongsTo
    {
    return $this->belongsTo(PurchaseOrder::class, 'foreign_key');
    }
}
