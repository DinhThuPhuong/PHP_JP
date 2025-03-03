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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('order_id')
                  ->constrained('orders')
                  ->cascadeOnDelete(); // Nếu muốn xóa đơn hàng thì xóa luôn chi tiết đơn hàng
            
            $table->foreignId('product_id')
                  ->constrained('products')
                  ->noActionOnDelete()   // Khi xóa sản phẩm, không thực hiện hành động nào trên order_details
                  ->noActionOnUpdate();  // Khi cập nhật sản phẩm, không thực hiện hành động nào trên order_details
        
            $table->unsignedInteger('quantity');
            
            // $table->timestamps(); // Thêm nếu cần
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};