<?php

class Receiptsetting extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

    protected $connection = 'sqlite2';
    protected $table = 'ReceiptSettings';
	protected $fillable = ['tax', 'haveReceipt', 'haveStamp', 'haveComment'];
    public $timestamps = false;

}