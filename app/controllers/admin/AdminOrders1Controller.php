<?php

class AdminOrders1Controller extends AdminController {

	/**
	 * order Repository
	 *
	 * @var order
	 */
	protected $order;

	public function __construct(Order $order)
	{
		$this->order = $order;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = $this->order->get();

		return View::make('orders1.index', compact('orders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('orders1.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Order::$rules);

		if ($validation->passes())
		{
			$this->order->create($input);

			return Redirect::route('admin.orders1.index');
		}

		return Redirect::route('admin.orders1.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order = $this->order->findOrFail($id);

		return View::make('orders1.show', compact('order'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$order = $this->order->find($id);

		if (is_null($order))
		{
			return Redirect::route('admin.orders1.index');
		}

		return View::make('orders1.edit', compact('order'));
	}

	public function complited()
	{
		$order = $this->order->findOdFail($id);
		$order->step1 = true;
		$order->save();
		return Redirect::route('admin.orders1.index');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Order::$rules);
		if ($validation->passes())
		{
			$order = $this->order->find($id);
			$order->update($input);

			return Redirect::route('admin.orders1.show', $id);
		}

		return Redirect::route('admin.orders1.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->order->find($id)->delete();

		return Redirect::route('admin.orders1.index');
	}

}
