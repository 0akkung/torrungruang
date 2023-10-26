<?php

use App\Models\PurchaseOrder;
use App\Models\RopeSpec;
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
        Schema::create('po_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PurchaseOrder::class);
            $table->foreignIdFor(RopeSpec::class);
            $table->integer('order_quantity')->comment('จำนวนที่สั่ง เช่น เชือก A สั่ง 1000 ม้วน');
            $table->double('unit_price')->nullable()->comment('price of spec per unit');
            $table->integer('remaining_quantity')->comment('จำนวนที่เหลือยังไมไ่ด้ส่งผลิต ให้ start เท่า Order_quantity เมื่อเปิดใบสั่งขาย ให้มาลบกับอันนี้');
            $table->double('po_item_price')->nullable()->comment('order_quantity * unit_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('po_items');
    }
};
