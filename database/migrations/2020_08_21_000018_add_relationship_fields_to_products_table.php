<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->foreign('category_id', 'category_fk_2035495')->references('id')->on('categories');
            $table->unsignedInteger('subcategory_id');
            $table->foreign('subcategory_id', 'subcategory_fk_2035496')->references('id')->on('subcategories');
            $table->unsignedInteger('created_by_id');
            $table->foreign('created_by_id', 'created_by_fk_2035497')->references('id')->on('users');
            $table->unsignedInteger('profile_id');
            $table->foreign('profile_id', 'profile_fk_2035545')->references('id')->on('profiles');
            $table->unsignedInteger('address_id');
            $table->foreign('address_id', 'address_fk_2035546')->references('id')->on('addresses');
        });
    }
}