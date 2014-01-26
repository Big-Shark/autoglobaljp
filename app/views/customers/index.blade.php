@extends('admin.layouts.default')

@section('content')

<h1>All Customers</h1>

<p>{{ link_to_route('admin.customers.create', 'Add new customer') }}</p>

@if ($customers->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<th>Fullname</th>
				<th>City</th>
				<th>Address</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($customers as $customer)
				<tr>
					<td>{{{ $customer->title }}}</td>
					<td>{{{ $customer->fullname }}}</td>
					<td>{{{ $customer->city }}}</td>
					<td>{{{ $customer->address }}}</td>
                    <td>{{ link_to_route('admin.customers.edit', 'Edit', array($customer->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.customers.destroy', $customer->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no customers
@endif

@stop
