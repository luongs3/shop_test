<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function ($table) {
            $table->increments('id')->unsigned();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->text('password');
            $table->boolean('is_super')->default(0);
            $table->boolean('is_active')->default(1);
            $table->string('reset_token', 64)->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('categories', function ($table) {
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('sku')->unique();
            $table->unsignedInteger('parent_category_id')->default(0);
            $table->timestamps();
        });

        Schema::create('products', function ($table) {
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('sku')->unique();
            $table->text('description')->nullable();
            $table->unsignedInteger('attribute_id')->nullable();
            $table->unsignedSmallInteger('status')->default(1); //1- saling, 2-run out of stock, 3-disable
            $table->unsignedInteger('category_id')->default(0);
            $table->decimal('price');
            $table->decimal('sale_price')->nullable();
            $table->unsignedSmallInteger('sale_off')->default(0);
            $table->string('brand')->nullable();
            $table->string('image')->nullable();
            $table->text('extra_images')->nullable();
            $table->timestamps();
        });

        Schema::create('attributes', function ($table) {
            $table->increments('id')->unsigned();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('attribute_products', function ($table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('attribute_id');
            $table->timestamps();
        });

        Schema::create('attribute_values', function ($table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('attributes_id');
            $table->string('value')->unique();
            $table->timestamps();
        });


        // Schema::create('invoices', function ($table) {
        //     $table->increments('id')->unsigned();
        //     $table->string('code')->unique();
        //     $table->unsignedInteger('address_id');
        //     $table->unsignedInteger('status')->default(0);//0-created, 1-proceed, 2-sheeping, 3-completed, 4-cancel, 5-postponed
        //     $table->decimal('total_price');
        //     $table->decimal('sub_price');
        //     $table->unsignedSmallInteger('tax');
        //     $table->timestamps();
        // });

        // Schema::create('invoice_products', function ($table) {
        //     $table->increments('id')->unsigned();
        //     $table->unsignedInteger('invoice_id');
        //     $table->unsignedInteger('product_id');
        //     $table->softDeletes();
        //     $table->timestamps();
        // });

        // Schema::create('invoice_users', function ($table) {
        //     $table->increments('id')->unsigned();
        //     $table->unsignedInteger('invoice_id');
        //     $table->unsignedInteger('user_id');
        //     $table->softDeletes();
        //     $table->timestamps();
        // });

        // Schema::create('addresses', function ($table) {
        //     $table->increments('id')->unsigned();
        //     $table->unsignedInteger('user_id');
        //     $table->timestamps();
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admins');
        Schema::drop('categories');
        Schema::drop('products');
        Schema::drop('attributes');
        Schema::drop('attribute_products');
        Schema::drop('attribute_values');
    }
}
