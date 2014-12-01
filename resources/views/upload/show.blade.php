@extends('layouts.app')

@section('content')
<div class="container" style="text-align: center;">
	<a href="{{ $illustration->publicPath() }}" target="_blank">
		<img src="{{ $illustration->publicPath() }}" />
	<a>
</div>
@stop