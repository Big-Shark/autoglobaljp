@extends('admin.layouts.default')

@section('content')

<h1>Create order</h1>
{{ Former::framework('TwitterBootstrap3') }}
{{ Former::horizontal_open()
  ->rules(['name' => 'required'])
  ->method('POST')
  ->route('admin.orders1.update', [$order->id]) 
}}

{{ Former::populate( $order ) }}

{{ Former::text('Номер_лота') }}
{{ Former::select('Название_аукциона')->options(['аукцион 1', 'аукцион 2']) }}
{{ Former::text('Название_авто') }}
{{ Former::select('Клиент')->fromQuery(Customer::all(), 'fullname', 'id') }}
{{ Former::text('Ставка_клиента') }}

{{ Former::actions( Button::submit('Submit') ) }}

{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


