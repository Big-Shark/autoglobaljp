@extends('admin.layouts.default')

@section('content')
<div class="container">
<h1>Approve Order</h1>
{{ Former::framework('TwitterBootstrap3') }}
{{ Former::horizontal_open()
  ->rules(['name' => 'required'])
  ->method('POST')
  ->route('admin.orders3.update', [$order->id]) }}

{{ Former::populate( $order ) }}

{{ Former::uneditable('Номер_лота')->disabled() }}
{{ Former::uneditable('Название_аукциона')->disabled() }}
{{ Former::uneditable('Название_авто')->disabled() }}
{{ Former::uneditable('Клиент')->disabled() }}
{{ Former::uneditable('Ставка_клиента')->disabled() }}

{{ Former::date('Дата_прихода_документов') }}
{{ Former::date('Дата_возврата_утилизационного_сбора') }}
{{ Former::input('Сумма_утилизационного_сбора') }}
{{ Former::input('Возврат_за_номер') }}
{{ Former::input('Кто_прислал_документы') }}

{{ Former::actions( Button::submit('Submit') ) }}

{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
</div>
@stop
