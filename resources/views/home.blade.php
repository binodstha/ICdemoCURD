@extends('shared.master')

@section('title')
@if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{!! "Search | " . Input::get('entry') !!}
@else 
	{!! "Home" !!}
@endif
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

@if (count($infolist) == 0)
	@if ($_SERVER['REQUEST_METHOD'] == 'POST')
		<div class="alert alert-info" role="alert">
			<strong>Info!</strong>
			The Search list is empty
		</div> 
	@else
		<div class="alert alert-info" role="alert">
			<strong>Info!</strong>
			The list is empty.
		</div> 
	@endif
@else
	@if ($_SERVER['REQUEST_METHOD'] == 'POST')
		<p class="text-ledt"> Showing Result for : <strong>{!! Input::get('entry') !!}</strong></p>
	@else
		<p class="text-ledt"> Current Page : <strong> {!! $page !!} </strong>  OF  {!! $pagecount !!}</p>
	@endif
	
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
			@if ($_SERVER['REQUEST_METHOD'] == 'POST')
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
			@else

			@foreach ($infolist as $info)
				@if ($count > ($size * ($page - 1)) AND $count <= ($size * $page))
					<tr>
						<td>{!! Html::link('/info/'. $info[3], $info[0]) !!}</td>
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
		@endif
	</div>
@endif
@endsection
