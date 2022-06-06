<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedialookupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('media_lookup', function($table) {
            $table->bigIncrements('id');
            $table->string('model_type');
            $table->integer('model_id');
            $table->foreignId('media_id')->constrained()->cascadeOnDelete();
            $table->string('collection_name');
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
        //
    }
}
