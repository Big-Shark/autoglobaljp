@extends('admin.layouts.default')

@section('content')

<h1>Show order</h1>

<p>{{ link_to_route('admin.orders3.index', 'Return to all orders') }}</p>

<table class="table table-striped table-bordered">
	<tbody>
		@foreach ($order->toArray() as $key=>$value)
		<tr>
			<td>{{{ $key }}}</td>
			<td>{{{ $value }}}</td>
		</tr>	
		@endforeach
		<tr>
			<td colspan="2">
				{{ link_to_route('admin.orders3.edit', 'Редактировать', array($order->id), array('class' => 'btn btn-info')) }}<br />
        	    {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.orders3.destroy', $order->id))) }}
            	    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
		</tr>
	</tbody>
</table>

@stop
