@extends('admin.layouts.default')

@section('content')

<h1>All orders</h1>

 @if ($orders->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Номер лота</th>
				<th>Название аукциона</th>
				<th>Название авто</th>
				<th>Клиент</th>
				<th>Ставка клиента</th>

				<th>Дата прихода документов</th>
				<th>Дата возврата утилизационного сбора</th>
				<th>Сумма утилизационного сбора</th>
				<th>Итого:</th>
				<th>Возврат за номер</th>
				<th>Итого за номер</th>
				<th>Кто прислал документы</th>
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

					<td>{{{ $order->Дата_прихода_документов }}}</td>
					<td>{{{ $order->Дата_возврата_утилизационного_сбора }}}</td>
					<td>{{{ $order->Сумма_утилизационного_сбора }}}</td>
					<td>{{{ $order->Сумма_утилизационного_сбора - $order->Утилизационный_сбор }}}</td>
					<td>{{{ $order->Возврат_за_номер }}}</td>
					<td>{{{ $order->Возврат_за_номер - $order->Услуга_за_номер }}}</td>
					<td>{{{ $order->Кто_прислал_документы }}}</td>
                    <td>{{ link_to_route('admin.orders3.edit', 'Редактировать', array($order->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.orders3.destroy', $order->id))) }}
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
