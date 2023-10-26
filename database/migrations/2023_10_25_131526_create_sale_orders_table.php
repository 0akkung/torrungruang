<?php

use App\Models\PurchaseOrder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sale_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PurchaseOrder::class);
            $table->date('sale_date');
            $table->double('original_order_price')->nullable()->comment('PO price before VAT 7%');
            $table->double('total_order_price')->nullable()->comment('PO price after VAT 7%');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_orders');
    }
};
