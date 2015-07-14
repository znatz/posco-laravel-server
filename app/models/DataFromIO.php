<?php

class Datafromio extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
    protected $table = "DataFromIOs";
	protected $fillable = ["tantoID","goodsTitle", "kosu", "time", "receiptNo"];
    public $timestamps = false;

}