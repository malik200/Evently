<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            //foreign key
            $table->unsignedBigInteger('user_id');
            //event details
            $table->string('event_name');
            $table->string('event_type');
            $table->text('event_description');
            $table->date('start_date');
            $table->date('end_date');
            $table->time('time');
            $table->string('venue');
            $table->string('city');
            $table->string('state');

            // Nullable details
            $table->string('featured_speakers')->nullable();
            $table->text('website')->nullable();
            $table->string('sponsors')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('instagram')->nullable();
            $table->string('logo')->nullable();
            $table->string('sponsor_images')->nullable();
            $table->string('upload_speaker')->nullable();

            //contact information
            $table->string('firstname');
            $table->string('lastname');
            $table->string('companyname')->nullable;
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number');
            $table->timestamps();
            //foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
