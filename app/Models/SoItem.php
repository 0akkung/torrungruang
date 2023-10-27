<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SoItem extends Model
{
    use HasFactory, SoftDeletes;
    public function saleOrder(): BelongsTo
{
    return $this->belongsTo(SaleOrder::class, 'foreign_key');
}
}
