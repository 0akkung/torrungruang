<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class PoItem extends Model
{
    use HasFactory,BelongsTo;
    public function purchaseOrder(): BelongsTo{
        return $this->belongsTo(PurchaseOrder::class);
    }
    public function ropeSpec(): BelongsTo{
        return $this->belongsTo(RopeSpec::class);
    }
}
