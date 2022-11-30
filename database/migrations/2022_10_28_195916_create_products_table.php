<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('sub_category_id')->constrained('sub_categories');
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->string('department');
            $table->string('serial_number');
            $table->string('parts_number');
            $table->string('location');
            $table->string('rack_number');
            $table->string('image')->nullable();
            $table->string('purchase_order_number')->unique();
            $table->date('purchase_at');
            $table->date('expire_at')->nullable();
            $table->integer('purchase_price')->unsigned();
            $table->integer('selling_price')->unsigned()->nullable()->default(0);
            $table->integer('quantity')->unsigned()->default(0);
            $table->string('country_origin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
