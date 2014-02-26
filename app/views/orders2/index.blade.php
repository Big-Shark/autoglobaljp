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
				
				<th>номер кузова</th>
				<th>год</th>
				<th>цена</th>
				<th>налог 5% от цены</th>
				<th>аукционный сбор</th>
				<th>налог 5% от аукционного сбора</th>
				<th>утилизационный сбор</th>
				<th>комиссия</th>
				<th>Услуга за номер</th>
				<th>Доставка до тоямы</th>
				<th>Доставка в порт</th>
				<th>Итого</th>
				<th>Итого ПОЛНАЯ</th>
				<th>Итого</th>
				<th></th>
				<th></th>
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

					<td>{{{ $order->Номер_кузова }}}</td>
					<td>{{{ $order->Год }}}</td>
					<td>{{{ $order->Цена }}}</td>
					<td>{{{ $order->Цена/100*5 }}}</td>
					<td>{{{ $order->Аукционный_сбор }}}</td>
					<td>{{{ $order->Аукционный_сбор/100*5 }}}</td>
					<td>{{{ $order->Утилизационный_сбор }}}</td>
					<td>{{{ $order->Комиссия }}}</td>
					<td>{{{ $order->Услуга_за_номер }}}</td>
					<td>{{{ $order->Доставка_до_тоямы }}}</td>
					<td>{{{ $order->Доставка_в_порт }}}</td>
					<td>{{{ $order->Цена + $order->Цена/100*5 + $order->Аукционный_сбор + $order->Аукционный_сбор/100*5 + $order->Утилизационный_сбор + $order->Услуга_за_номер}}}</td>
					<td>{{{ $order->Цена + $order->Цена/100*5 + $order->Аукционный_сбор + $order->Аукционный_сбор/100*5 + $order->Утилизационный_сбор}}}</td>
					<td>{{{ $order->Цена + $order->Цена/100*5 + $order->Аукционный_сбор + $order->Аукционный_сбор/100*5 + $order->Утилизационный_сбор}}}</td>
                    <td>{{ link_to_route('admin.orders2.edit', 'Редактировать', array($order->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.orders2.destroy', $order->id))) }}
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
