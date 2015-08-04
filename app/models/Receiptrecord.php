<?php

class Receiptrecord extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $connection = "ReceiptMaster";
	protected $table      = "Receiptrecords";
	protected $fillable = [];

}