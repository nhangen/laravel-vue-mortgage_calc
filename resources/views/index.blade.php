@extends('default')

@section('title', 'The world\'s best mortgage calculator')

@section ('content')

	@parent
	<div id="calc" class="calc">
		<calc-input></calc-input>
	</div>
@stop