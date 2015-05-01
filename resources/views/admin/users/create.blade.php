@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo usuario</div>
				<div class="panel-body">
					{!! Form::open(['route'=>'admin.users.create','method'=>'POST']) !!}
					
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

