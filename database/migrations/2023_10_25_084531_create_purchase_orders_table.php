<?php
use App\Models\Customer;
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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Customer::class);
            $table->date('due_date')->comment('deadline');
            $table->date('purchase_date');
            $table->string('customer_po_id')->comment('PO ID of a customers from theirs');
            $table->string('purchase_address')->comment('address where you want to sent');
            $table->double('original_order_price')->nullable()->comment('Total PO price before VAT 7%  (sum all po_item_price) ');
            $table->double('total_order_price')->nullable()->comment('Total PO price after VAT 7%');
            $table->boolean('produce_status');
            $table->boolean('payment_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
