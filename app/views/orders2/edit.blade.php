@extends('admin.layouts.default')

@section('content')
<div class="container">
<h1>Approve Order</h1>
{{ Former::framework('TwitterBootstrap3') }}
{{ Former::horizontal_open()
  ->rules(['name' => 'required'])
  ->method('POST')
  ->route('admin.orders2.update', [$order->id]) }}

{{ Former::populate( $order ) }}

{{ Former::uneditable('Номер_лота')->disabled() }}
{{ Former::uneditable('Название_аукциона')->disabled() }}
{{ Former::uneditable('Название_авто')->disabled() }}
{{ Former::uneditable('Клиент')->disabled() }}
{{ Former::uneditable('Ставка_клиента')->disabled() }}

{{ Former::input('Номер_кузова') }}
{{ Former::input('Год') }}
{{ Former::input('Цена') }}
{{ Former::input('Аукционный_сбор') }}
{{ Former::input('Утилизационный_сбор') }}
{{ Former::input('Комиссия') }}
{{ Former::input('Услуга_за_номер') }}
{{ Former::input('Доставка_до_тоямы') }}
{{ Former::input('Доставка_в_порт') }}
{{ Former::input('Номер_кузова') }}
{{ Former::input('Номер_кузова') }}
{{ Former::input('Номер_кузова') }}

{{ Former::actions( Button::submit('Submit') ) }}

{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
</div>
@stop
