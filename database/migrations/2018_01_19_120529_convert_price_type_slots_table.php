<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConvertPriceTypeSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('slots', function (Blueprint $table) {
        $table->decimal('prize', 8, 2)->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('slots', function (Blueprint $table) {
        $table->dropColumn('prize');
        $table->integer('prize');

      });
    }
}
