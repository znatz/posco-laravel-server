<?php

class ReceiptLine extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $table    = 'receipt_lines';
    protected $connection = 'cashierClient';
	protected $fillable = ['tantoID', 'goodsTitle', 'kosu', 'time', 'receiptNo', 'tableNO', 'price'];

}