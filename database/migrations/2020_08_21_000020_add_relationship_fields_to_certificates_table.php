<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCertificatesTable extends Migration
{
    public function up()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->unsignedInteger('address_id');
            $table->foreign('address_id', 'address_fk_2035607')->references('id')->on('addresses');
            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2035612')->references('id')->on('users');
            $table->unsignedInteger('profile_id')->nullable();
            $table->foreign('profile_id', 'profile_fk_2035614')->references('id')->on('profiles');
        });
    }
}