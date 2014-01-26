<?php

class Car extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'ship' => 'required',
		'date' => 'required',
		'model' => 'required',
		'mark' => 'required',
		'body' => 'required',
		'year' => 'required',
		'comment' => 'required',
		'status' => 'required',
		'customer_id' => 'required'
	);

	public function customer(){
		return $this->belongsTo('Customer');
	}
}
