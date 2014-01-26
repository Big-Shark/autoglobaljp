@extends('admin.layouts.default')

@section('content')

<h1>Create Order</h1>

{{ Form::open(array('route' => 'admin.cars.store')) }}
	<ul>
        <li>
            {{ Form::label('ship', 'Ship:') }}
            {{ Form::text('ship') }}
        </li>

        <li>
            {{ Form::label('date', 'Date:') }}
            {{ Form::text('date') }}
        </li>

        <li>
            {{ Form::label('model', 'Model:') }}
            {{ Form::text('model') }}
        </li>

        <li>
            {{ Form::label('mark', 'Mark:') }}
            {{ Form::text('mark') }}
        </li>

        <li>
            {{ Form::label('body', 'Body:') }}
            {{ Form::text('body') }}
        </li>

        <li>
            {{ Form::label('year', 'Year:') }}
            {{ Form::text('year') }}
        </li>

        <li>
            {{ Form::label('comment', 'Comment:') }}
            {{ Form::textarea('comment') }}
        </li>

        <li>
            {{ Form::label('status', 'Status:') }}
            {{ Form::text('status') }}
        </li>

        <li>
            {{ Form::label('customer_id', 'Customer:') }}
            {{ Form::select('customer_id', Customer::all()->lists('title', 'id')) }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


