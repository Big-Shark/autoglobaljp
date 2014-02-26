@extends('admin.layouts.default')

@section('content')

<h1>All orders</h1>

<p>{{ link_to_route('admin.orders1.create', 'Add new order') }}</p>

@if ($orders->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Номер_лота</th>
				<th>Название_аукциона</th>
				<th>Название_авто</th>
				<th>Клиент</th>
				<th>Ставка_клиента</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($orders as $order)
				<tr>
					<td>{{{ $order->Номер_лота }}}</td>
					<td>{{{ $order->Номер_лота }}}</td>
					<td>{{{ $order->Название_аукциона }}}</td>
					<td>{{{ $order->Название_авто }}}</td>
					<td>{{{ $order->Клиент }}}</td>
					<td>{{{ $order->Ставка_клиента }}}</td>
					<td>{{ link_to_route('admin.orders1.edit', 'Редактировать', array($order->id), array('class' => 'btn btn-info')) }}</td>
                    <td>{{ link_to_route('admin.orders1.complited', 'Купил', array($order->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.orders1.destroy', $order->id))) }}
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
