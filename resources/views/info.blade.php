
@extends('shared.master')
@section('title')
	@foreach ($infolist as $info)
	@if ($info[3] == $email)
	{!! "Info | " . $info[0] !!}
	@endif
@endforeach
@endsection
@section('content')
<div class = 'col-sm-8'>
<?php $count = 0; ?>
	@foreach ($infolist as $info)
	@if(count($info) > 0)
	@if ($info[3] == $email)
	<table class = 'table table-striped'>
		<tr>
			<th>Name</th>
			<td>{!! $info[0] !!}</td>
		</tr>
		<tr>
			<th>Gender</th>
			<td>{!! $info[1] !!}</td>
		</tr>
		<tr>
			<th>Phone Num</th>
			<td>{!! $info[2] !!}</td>
		</tr>
		<tr>
			<th>Email</th>
			<td>{!! $info[3] !!}</td>
		</tr>
		<tr>
			<th>Adderss</th>

			<td>{!! $info[4] !!}</td>
		</tr>
		<tr>
			<th>nationality</th>

			<td>{!! $info[5] !!}</td>
		</tr>
		<tr>
			<th>Date of Birth</th>
			<td>{!! $info[6] !!}</td>
		</tr>
		<tr>
			<th>Education</th>
			@if($info[8] != "")
			<td>{!! $info[7] . "(" . $info[8] . "%)" !!}</td>
			@else
			<td>{!! $info[7] !!}</td>
			@endif
		</tr>
		<tr>
			<th>Mode of Contact</th>
			<td>{!! $info[9] !!}</td>
		</tr>
	</table>
	@break
	@endif
	@endif
	@endforeach	
</div>
<div class = 'col-sm-4'>
		<table class = 'table table-hover'>
		<thead class="thead-inverse">
			<tr>
				<th>Name</th>
				<th>Email</th>
			</tr>
		</thead>
		@foreach ($infolist as $info)
		@if ($count < 10)
		<tr>
			<td>{!!  Html::link('/info/'. $info[3], $info[0]) !!}</td>
			<td>{!! $info[3] !!}</td>	
		</tr>
		@endif
		<?php $count++; ?>
		@endforeach
	</table>
</div>
@endsection


