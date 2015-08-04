<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceiptrecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('ReceiptMaster')->create('Receiptrecords', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('tantoID');
			$table->text('receiptNo');
			$table->text('tableNO');
			$table->text('goodsTitle');
			$table->integer('kosu');
			$table->integer('price');
			$table->text('orderTime');
			$table->text('serveTime');
			$table->text('paymentTime');
			$table->integer('payment_id');
			$table->text('progress');
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
		Schema::connection('ReceiptMaster')->drop('Receiptrecords');
	}

}
