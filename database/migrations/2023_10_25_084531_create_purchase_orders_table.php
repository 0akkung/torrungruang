<?php

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
            $table->id('po_id');
//            $table->foreignIdFor(Customer::class);
            $table->date('purchase_date');
            $table->string('customer_po_id')->comment('PO ID of a customer');
            $table->double('original_order_price')->nullable();
            $table->double('total_order_price')->nullable();
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
