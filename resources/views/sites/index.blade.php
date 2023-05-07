@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title')
  {{$info_site->site_name}} - Docenti
@endsection

@section('page_title')
  {{$info_site->site_name}} - Docenti
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item">Sedi</li>
    <li class="breadcrumb-item active" aria-current="page">{{$info_site->site_name}}</li>
  </ol>
</nav>
@endsection

@section('body')
<div class="row">
    <!--TEXT-->
    <div class="col-sm-9 col-md-6">
        <p>
            {{$info_site->street}} 
            {{$info_site->number}}, 
            {{$info_site->postcode}}, 
            {{$info_site->city}} 
            ({{$info_site->province}})
            <br></br>
        </p>
    </div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-offset-10 col-md-12">
			<table class="table table-striped table-hover table-responsive table-bordered">
				<col width="45%"/>
				<col width="45%"/>
				<col width="10%"/>
				<thead>
					<tr>
						<th>Cognome</th>
						<th>Nome</th>
						<th>Azioni</th>                            
					</tr>
				</thead>
				<tbody>
					@foreach($teachers_list as $teacher)
						<tr>
							<td>{{$teacher->lastname}}</td>
							<td>{{$teacher->firstname}}</td>
							<td>
								<button type="button" class="btn btn-primary">
									<a href="{{route('teachers.timetable', $teacher->id)}}"><i class="bi bi-clock"></i> Orario</a>
								</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection