<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZametkaCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zametka_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zametka_group_id')->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->string("title");
            $table->integer("sort")->default(999);
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
        Schema::dropIfExists('zametka_cards');
    }
}
