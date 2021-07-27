<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('app_name', 50);
            $table->string('app_url', 100);
            $table->string('mail_mailer', 10);
            $table->string('mail_host', 100);
            $table->smallInteger('mail_port')->length(3);
            $table->string('mail_username', 50);
            $table->string('mail_password', 256);
            $table->string('mail_encryption', 3);
            $table->string('mail_from_address', 100);
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
        Schema::dropIfExists('email_configs');
    }
}
