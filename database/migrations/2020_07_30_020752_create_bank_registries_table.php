<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankRegistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_registries', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->integer('bank_type_id')->unsigned();
            $table->string('branch');
            $table->string('address');
            $table->string('remarks')->nullable();
            $table->integer('isInactive')->default(0);
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
        Schema::dropIfExists('bank_registries');
    }
}
