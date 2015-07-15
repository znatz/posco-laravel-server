<?php

class Category extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
    protected $table = "BBUMAS";
	protected $fillable = ["Bumon"];
    public $timestamps = false;

}