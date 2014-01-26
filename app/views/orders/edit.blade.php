@extends('admin.layouts.default')

@section('content')
<div class="container">
<h1>Approve Order</h1>
{{ Former::framework('TwitterBootstrap3') }}
{{ Former::horizontal_open()
  ->rules(['name' => 'required'])
  ->method('POST')
  ->route('admin.orders.update', [$order->id]) }}

{{ Former::populate( $order ) }}

{{ Former::uneditable('Номер_лота')->disabled() }}
{{ Former::uneditable('Название_аукциона')->disabled() }}
{{ Former::uneditable('Название_авто')->disabled() }}
{{ Former::uneditable('Клиент')->disabled() }}
{{ Former::uneditable('Ставка_клиента')->disabled() }}

{{ Former::data('Дата') }}
{{ Former::input('Кузов') }}
{{ Former::input('Год') }}
{{ Former::input('Покупка') }}
{{ Former::input('аукционный_сбор') }}
{{ Former::input('рисайкл') }}
{{ Former::input('tax') }}
{{ Former::input('ricso') }}
{{ Former::input('ship') }}
{{ Former::input('port') }}
{{ Former::select('тип_распила')->options(["Перед + Зад", "Целая", "Перед"]) }}
{{ Former::input('провоз') }}
{{ Former::input('услуга') }}
{{ Former::input('пошлина') }}
{{ Former::input('склад') }}
{{ Former::input('euro3') }}
{{ Former::input('год_цена') }}
{{ Former::input('осаго') }}
{{ Former::input('гаи') }}
{{ Former::input('банк') }}
{{ Former::input('оформление') }}
{{ Former::input('физик-2') }}
{{ Former::input('экспкртиза') }}
{{ Former::input('коррект') }}

{{ Former::actions( Button::submit('Submit') ) }}

{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
</div>
@stop
