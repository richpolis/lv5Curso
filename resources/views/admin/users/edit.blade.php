@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Actualizar usuario "{{ $user->full_name }}"</div>
				<div class="panel-body">
					@include('admin.partials.errores')
					{!! Form::model($user,['route'=>['admin.users.update',$user->id],'method'=>'PUT']) !!}
						@include('admin.users.partials.form')
						<button type="submit" class="btn btn-default">Actualizar usuario</button>
					{!! Form::close() !!}
				</div>				
			</div>
			@include('admin.users.partials.formDelete')
		</div>
	</div>
</div>
@endsection

