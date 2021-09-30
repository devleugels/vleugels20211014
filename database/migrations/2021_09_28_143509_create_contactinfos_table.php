<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactinfos', function (Blueprint $table) {
            $table->id();
            $table->string('banknaam');
            $table->string('iban');
            $table->string('bic');
            $table->string('afzendernaam');
            $table->string('straat');
            $table->string('huisnummer');
            $table->string('postcode');
            $table->string('gemeente');
            $table->string('telefoon');
            $table->unsignedBigInteger('email_id')->nullable();  
            
            $table->foreign('email_id')->references('id')->on('emailadressens')->onDelete('cascade');           
                    
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
        Schema::dropIfExists('contactinfos');
    }
}
