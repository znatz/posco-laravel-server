<?php

class Payment extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $connection = "ReceiptMaster";
	protected $fillable = ['price', 'payment', 'changes', 'time', 'uuid','shopName', 'employeeName'];

}