@extends('admin.layouts.default')

@section('content')

<h1>All orders</h1>

<p>{{ link_to_route('admin.orders.create', 'Add new order') }}</p>

@if ($orders->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Номер лота</th>
				<th>Название аукциона</th>
				<th>Название авто</th>
				<th>Клиент</th>
				<th>Ставка клиента</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($orders as $order)
				<tr>
					<td>{{{ $order->Номер_лота }}}</td>
					<td>{{{ $order->Название_аукциона }}}</td>
					<td>{{{ $order->Название_авто }}}</td>
					<td>{{{ $order->Клиент }}}</td>
					<td>{{{ $order->Ставка_клиента }}}</td>
                    <td>{{ link_to_route('admin.orders.edit', 'Купили', array($order->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.orders.destroy', $order->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no orders
@endif

@stop
