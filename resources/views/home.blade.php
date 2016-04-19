@extends('shared.master')
@section('title')
Home
@endsection
@section('content')
<?php 
$count = 1; 
$size = 5;
if ((count($infolist) % $size) > 0 )
	$pagecount = (count($infolist) - (count($infolist) % $size)) / $size + 1;
else 
	$pagecount = count($infolist) / $size;

?>
@if(count($infolist) == 0)
{{"THE LIST IS EMPTY"}}
@else

<p class="text-ledt"> Current Page : {!! $page . ' OF ' . $pagecount !!}</p>
<div class="table-responsive">
	<table class = 'table table-hover'>
		<thead class="thead-inverse">
			<tr>
				<th>Name</th>
				<th>Gender</th>
				<th>Phone Num</th>
				<th>Email</th>
				<th>Adderss</th>
				<th>Date of Birth</th>
				<th>Education</th>
			</tr>
		</thead>
		@foreach ($infolist as $info)
		@if ($count > ($size * ($page - 1)) AND $count <= ($size * $page))
		<tr>
			<td>{!!  Html::link('/info/'. $info[3], $info[0]) !!}</td>
			<td>{!! $info[1] !!}</td>
			<td>{!! $info[2] !!}</td>
			<td>{!! $info[3] !!}</td>
			<td>{!! $info[4] !!}</td>
			<td>{!! $info[6] !!}</td>
			<td>{!! $info[7] !!}</td>	
		</tr>
		@endif
		<?php $count++; ?>
		@endforeach
	</table>
	<ul class="pagination">
		@for ($i = 1; $i <= $pagecount; $i++)
		<li class="page-item">
			{!! Html::link('/list/'. $i, $i)!!}
		</li>
		@endfor
	</ul>

</div>
@endif
@endsection




