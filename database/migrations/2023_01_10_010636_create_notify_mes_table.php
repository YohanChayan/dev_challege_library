<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifyMesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notify_me', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constraned('books')->nullable();
            $table->foreignId('user_id')->constraned('users')->nullable();
            $table->string('notify_via')->nullable(); //Whatsapp, Telegram, Facebook Messenger
            $table->string('source')->nullable(); //Phone number (Whatsapp, Telegram), Url (Facebook Messenger)
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
        Schema::dropIfExists('notify_mes');
    }
}
