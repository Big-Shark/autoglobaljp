@extends('admin.layouts.default')

@section('content')
<div class="container">
<h1>Approve Order</h1>
{{ Former::framework('TwitterBootstrap3') }}
{{ Former::horizontal_open()
  ->rules(['name' => 'required'])
  ->method('POST')
  ->route('admin.orders4.update', [$order->id]) }}

{{ Former::populate( $order ) }}

{{ Former::uneditable('Номер_лота')->disabled() }}
{{ Former::uneditable('Название_аукциона')->disabled() }}
{{ Former::uneditable('Название_авто')->disabled() }}
{{ Former::uneditable('Клиент')->disabled() }}
{{ Former::uneditable('Ставка_клиента')->disabled() }}

{{ Former::date('Дата_погрузки') }}
{{ Former::input('Название_парахода') }}
{{ Former::select('Тип_кузова')->options([
    1  => 'Целая',
    2  => 'Половинка',
]) }}
{{ Former::select('Кто_пилил')->options([
    1  => 'Рога и копыта',
    2  => 'Копыта и рога',
]) }}
{{ Former::number('По_чем_пилили') }}
{{ Former::date('Дата_ухода_машины_со_стоянки') }}

{{ Former::actions( Button::submit('Submit') ) }}

{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
</div>
@stop
