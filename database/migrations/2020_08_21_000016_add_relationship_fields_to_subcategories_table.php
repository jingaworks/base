<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSubcategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('subcategories', function (Blueprint $table) {
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_2038369')->references('id')->on('categories');
            $table->unsignedInteger('created_by_id');
            $table->foreign('created_by_id', 'created_by_fk_2038497')->references('id')->on('users');
            $table->unsignedInteger('approved_by_id');
            $table->foreign('approved_by_id', 'approved_by_fk_2039497')->references('id')->on('users');
        });
    }
}