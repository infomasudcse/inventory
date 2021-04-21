<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('name');
            $table->string('address');
            $table->string('phone')->nullable($value = true);
            $table->string('tax_code')->nullable($value = true);
            $table->timestamps();
        });

        DB::table('branches')->insert([
            'title'=>'Head Office',
            'name'=>'Head Office',
            'address'=>'Dhaka',
            'phone'=>'01234567890',
            'tax_code'=>'15151515'
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
