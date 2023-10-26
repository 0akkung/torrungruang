<?php
use App\Models\SaleOrder;
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
        Schema::create('so_items', function (Blueprint $table) {
            $table->foreignIdFor(SaleOrder::class);
            $table->foreignIdFor(RopeSpec::class);
            $table->integer('sale_quantity')->comment('จำนวนที่เปิดใบสั่งขาย ห้ามมากกว่า order_quantity ใน po_item');
            $table->double('so_item_price')->nullable()->comment('sale_quantity * unit_price ของแต่ละ spec ใน PO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('so_items');
    }
};
