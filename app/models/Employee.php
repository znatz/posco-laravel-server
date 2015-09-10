<?php

class Employee extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required',
		'shop' => 'required'
	];

    public static $update_rules = [
        'name' => 'required',
        'shop' => 'required',
        'new_name' => 'required'
    ];

	// Don't forget to fill this array
    protected  $table = "Employees";
    protected $fillable = ["name", "shop"];
    public $timestamps = false;


}