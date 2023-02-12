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
            $table->foreignId('sub_group_id')->constrained('sub_groups');
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->foreignId('country_id')->constrained('countries');
            $table->foreignId('department_id')->constrained('departments');
            $table->string('name');
            $table->string('batch_number');
            $table->string('parts_number');
            $table->integer('quantity')->unsigned()->default(0);
            $table->enum('condition', ['new', 'used', 'damaged']);
            $table->string('location');
            $table->string('rack_number');
            $table->string('image')->nullable();
            $table->string('purchase_order_number');
            $table->integer('purchase_price')->unsigned()->default(0);
            $table->integer('selling_price')->unsigned()->nullable()->default(0);
            $table->date('purchase_at')->default(now());
            $table->date('expire_at')->nullable();
            $table->text('note')->nullable();
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
