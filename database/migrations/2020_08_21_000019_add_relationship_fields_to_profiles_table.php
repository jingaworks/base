<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2035358')->references('id')->on('users');
            $table->unsignedInteger('address_id');
            $table->foreign('address_id', 'address_fk_2035544')->references('id')->on('addresses');
        });
    }
}