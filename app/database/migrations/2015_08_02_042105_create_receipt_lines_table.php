<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceiptLinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('cashierClient')->create('receipt_lines', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('tantoID');
			$table->text('goodsTitle');
			$table->integer('kosu');
			$table->text('time');
			$table->text('receiptNo');
			$table->text('tableNO');
			$table->integer('price');
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
		Schema::connection('cashierClient')->drop('receipt_lines');
	}

}
