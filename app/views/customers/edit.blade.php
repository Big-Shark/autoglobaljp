@extends('admin.layouts.default')

@section('content')

<h1>Edit Customer</h1>
{{ Form::model($customer, array('method' => 'PATCH', 'route' => array('admin.customers.update', $customer->id))) }}
	<ul>
        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>

        <li>
            {{ Form::label('fullname', 'Fullname:') }}
            {{ Form::text('fullname') }}
        </li>

        <li>
            {{ Form::label('city', 'City:') }}
            {{ Form::text('city') }}
        </li>

        <li>
            {{ Form::label('address', 'Address:') }}
            {{ Form::text('address') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('admin.customers.show', 'Cancel', $customer->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
