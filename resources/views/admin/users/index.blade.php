@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Usuarios</div>
				<div class="panel-body">
					<p>
						<a class="btn btn-info" href="{{route('admin.users.create')}}" role="button">
							Crear usuario
						</a>
					</p>
					<p>Hay {{ $usuarios->total() }} registos</p>
					<table class="table table-striped">
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Email</th>
							<th>Actions</th>
						</tr>
						@foreach($usuarios as $usuario)
						<tr>
							<td>{!! $usuario->id !!}</td>
							<td>{!! $usuario->first_name !!}</td>
							<td>{!! $usuario->last_name !!}</td>
							<td>{!! $usuario->email !!}</td>
							<td>
								<a href="">Editar</a>
								<a href="">Eliminar</a>
							</td>
						</tr>
						@endforeach
					</table>
					{!! $usuarios->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
