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

				<th>Название парахода</th>
				<th>Тип кузова</th>
				<th>Кто пилил</th>
				<th>По чем пилили</th>
				<th>Дата ухода машины со стоянки</th>
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

					<td>{{{ $order->Название_парахода }}}</td>
					<td>{{{ $order->Тип_кузова }}}</td>
					<td>{{{ $order->Кто_пилил }}}</td>
					<td>{{{ $order->По_чем_пилили }}}</td>
					<td>{{{ $order->Дата_ухода_машины_со_стоянки }}}</td>
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
