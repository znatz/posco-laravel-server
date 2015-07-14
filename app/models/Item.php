<?php

class Item extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
    protected $table = "BTSMAS";
	protected $fillable = ['title', 'price', 'genka', 'Bumon', 'contents', 'Kosu'];
    public $timestamps = false;

}