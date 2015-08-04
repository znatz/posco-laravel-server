<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('ReceiptMaster')->create('payments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('price');
			$table->integer('payment');
			$table->integer('changes');
			$table->text('time');
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
		Schema::connection('ReceiptMaster')->drop('payments');
	}

}
