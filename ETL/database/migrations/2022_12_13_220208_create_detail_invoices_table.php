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
        Schema::create('detail_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('agency_id');
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('passit_id');
            $table->float('priceTotal');
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('agency_id')->references('id')->on('agencies');
            $table->foreign('invoice_id')->references('id')->on('agencies');
            $table->foreign('passit_id')->references('id')->on('passits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_invoices');
    }
};
