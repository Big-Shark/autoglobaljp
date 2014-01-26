<?php

class AdminCarsController extends AdminController {

	/**
	 * Car Repository
	 *
	 * @var Car
	 */
	protected $car;

	public function __construct(Car $car)
	{
		$this->car = $car;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cars = $this->car->with('customer')->get();

		return View::make('cars.index', compact('cars'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('cars.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Car::$rules);

		if ($validation->passes())
		{
			$this->car->create($input);

			return Redirect::route('admin.cars.index');
		}

		return Redirect::route('admin.cars.create')
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
		$car = $this->car->findOrFail($id);

		return View::make('cars.show', compact('car'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$car = $this->car->find($id);

		if (is_null($car))
		{
			return Redirect::route('admin.cars.index');
		}

		return View::make('cars.edit', compact('car'));
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
		$validation = Validator::make($input, Car::$rules);

		if ($validation->passes())
		{
			$car = $this->car->find($id);
			$car->update($input);

			return Redirect::route('admin.cars.show', $id);
		}

		return Redirect::route('admin.cars.edit', $id)
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
		$this->car->find($id)->delete();

		return Redirect::route('admin.cars.index');
	}

}
