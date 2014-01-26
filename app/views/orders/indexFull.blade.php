@extends('admin.layouts.default')

@section('content')

<h1>All orders</h1>

<p>{{ link_to_route('admin.orders.create', 'Add new order') }}</p>

@if ($orders->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Год</th>
				<th>Дата</th>
				<th>Клиент</th>
				<th>Кузов</th>
				<th>Название авто</th>
				<th>Название аукциона</th>
				<th>Номер лота</th>
				<th>Покупка</th>
				<th>Ставка клиента</th>
				<th>аукционный сбор</th>
				<th>банк</th>
				<th>гаи</th>
				<th>год цена</th>
				<th>коррект</th>
				<th>осаго</th>
				<th>оформление</th>
				<th>пошлина</th>
				<th>провоз</th>
				<th>рисайкл</th>
				<th>склад</th>
				<th>тип распила</th>
				<th>услуга</th>
				<th>физик-2</th>
				<th>экспкртиза</th>
				<th>euro3</th>
				<th>port</th>
				<th>ricso</th>
				<th>ship</th>
				<th>tax</th>
				<th></th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			@foreach ($orders as $order)
				<tr>
					<td>{{{ $order->Номер_лота }}}</td>
					<td>{{{ $order->Год }}}</td>
					<td>{{{ $order->Дата }}}</td>
					<td>{{{ $order->Клиент }}}</td>
					<td>{{{ $order->Кузов }}}</td>
					<td>{{{ $order->Название_авто }}}</td>
					<td>{{{ $order->Название_аукциона }}}</td>
					<td>{{{ $order->Номер_лота }}}</td>
					<td>{{{ $order->Покупка }}}</td>
					<td>{{{ $order->Ставка_клиента }}}</td>
					<td>{{{ $order->аукционный_сбор }}}</td>
					<td>{{{ $order->банк }}}</td>
					<td>{{{ $order->гаи }}}</td>
					<td>{{{ $order->год_цена }}}</td>
					<td>{{{ $order->коррект }}}</td>
					<td>{{{ $order->осаго }}}</td>
					<td>{{{ $order->оформление }}}</td>
					<td>{{{ $order->пошлина }}}</td>
					<td>{{{ $order->провоз }}}</td>
					<td>{{{ $order->рисайкл }}}</td>
					<td>{{{ $order->склад }}}</td>
					<td>{{{ $order->тип_распила }}}</td>
					<td>{{{ $order->услуга }}}</td>
					<td>{{{ $order->физик-2 }}}</td>
					<td>{{{ $order->экспкртиза }}}</td>
					<td>{{{ $order->euro3 }}}</td>
					<td>{{{ $order->port }}}</td>
					<td>{{{ $order->ricso }}}</td>
					<td>{{{ $order->ship }}}</td>
					<td>{{{ $order->tax }}}</td>
                    <td>{{ link_to_route('admin.orders.edit', 'Редактировать', array($order->id), array('class' => 'btn btn-info')) }}</td>
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
