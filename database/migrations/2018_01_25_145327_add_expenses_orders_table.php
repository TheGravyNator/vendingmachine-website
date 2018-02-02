<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExpensesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('orders', function (Blueprint $table) {
          $table->integer('slot_1_expenses');
          $table->integer('slot_2_expenses');
          $table->integer('slot_3_expenses');
          $table->integer('slot_4_expenses');
          $table->integer('slot_5_expenses');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('orders', function (Blueprint $table) {
          $table->dropColumn('slot_1_expenses');
          $table->dropColumn('slot_2_expenses');
          $table->dropColumn('slot_3_expenses');
          $table->dropColumn('slot_4_expenses');
          $table->dropColumn('slot_5_expenses');
      });
    }
}
