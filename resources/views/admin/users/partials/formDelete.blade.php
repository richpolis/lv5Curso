{!! Form::open(['route'=>['admin.users.destroy',$user],'method'=>'DELETE']) !!}
	<button type="submit" onclick="return confirm('Desea eliminar el registro?')" class="btn btn-danger">Eliminar</button>
{!! Form::close() !!}