<?php

class AdminOrdersController extends AdminController {

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
		$orders = $this->order->where('купленна', '!=', true)->get();

		return View::make('orders.index', compact('orders'));
	}


	public function indexFull()
	{
		$orders = $this->order->where('купленна', true)->get();

		return View::make('orders.indexFull', compact('orders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('orders.create');
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

			return Redirect::route('admin.orders.index');
		}

		return Redirect::route('admin.orders.create')
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

		return View::make('orders.show', compact('order'));
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
			return Redirect::route('admin.orders.index');
		}

		return View::make('orders.edit', compact('order'));
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
			$order->купленна = true;
			$order->update($input);

			return Redirect::route('admin.orders.show', $id);
		}

		return Redirect::route('admin.orders.edit', $id)
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

		return Redirect::route('admin.orders.index');
	}

}
