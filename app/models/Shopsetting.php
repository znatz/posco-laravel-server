<?php

class Shopsetting extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

    protected $connection = 'sqlite2';
    protected $table = "ShopSettings";
	protected $fillable = ['tempo', 'reji', 'receipt'];
    public $timestamps = false;


}