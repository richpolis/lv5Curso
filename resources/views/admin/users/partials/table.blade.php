					<table class="table table-striped">
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Email</th>
							<th>Tipo</th>
							<th>Actions</th>
						</tr>
						@foreach($usuarios as $usuario)
						<tr id="registro-{{$usuario->id}}" data-id="{{ $usuario->id }}">
							<td>{!! $usuario->id !!}</td>
							<td>{!! $usuario->first_name !!}</td>
							<td>{!! $usuario->last_name !!}</td>
							<td>{!! $usuario->email !!}</td>
							<td>{!! $usuario->type !!}</td>
							<td>
								<a href="{{route('admin.users.edit',$usuario)}}">Editar</a>
								<a href="#!" class="btn-eliminar">Eliminar</a>
							</td>
						</tr>
						@endforeach
					</table>