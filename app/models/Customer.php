<?php

class Customer extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'fullname' => 'required',
		'city' => 'required',
		'address' => 'required',
	);
}
