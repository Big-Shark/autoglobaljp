@extends('admin.layouts.default')

@section('content')

<h1>Show Car</h1>

<p>{{ link_to_route('admin.cars.index', 'Return to all cars') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Ship</th>
				<th>Date</th>
				<th>Model</th>
				<th>Mark</th>
				<th>Body</th>
				<th>Year</th>
				<th>Comment</th>
				<th>Status</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $car->ship }}}</td>
					<td>{{{ $car->date }}}</td>
					<td>{{{ $car->model }}}</td>
					<td>{{{ $car->mark }}}</td>
					<td>{{{ $car->body }}}</td>
					<td>{{{ $car->year }}}</td>
					<td>{{{ $car->comment }}}</td>
					<td>{{{ $car->status }}}</td>
                    <td>{{ link_to_route('admin.cars.edit', 'Edit', array($car->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.cars.destroy', $car->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
