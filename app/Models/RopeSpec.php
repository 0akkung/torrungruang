<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class RopeSpec extends Model
{
    use HasFactory;
    public function poItems(): HasMany{
        return $this->hasMany(PoItem::class);
    }
    public function soItems(): HasMany{
        return $this->hasMany(SoItem::class);
    }
}
