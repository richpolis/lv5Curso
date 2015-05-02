@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Usuarios</div>
				
				@if(Session::has('message'))
					<p class="alert alert-success">{{Session::get('message')}}</p>
				@else 
					<p class="alert alert-success" style="display: none;"></p>
				@endif
				<div class="panel-body">
					{!! Form::model(Request::only(['name','type']),['route'=>'admin.users.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right', 'role'=>'search']) !!}
					  <div class="form-group">
					    {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Nombre de usuario']) !!}
					    {!! Form::select('type',config('options.types'),null, ['class'=>'form-control']) !!}
					  </div>
					  <button type="submit" class="btn btn-default">Buscar</button>
					{!! Form::close() !!}
					<p>
						<a class="btn btn-info" href="{{route('admin.users.create')}}" role="button">
							Crear usuario
						</a>
					</p>
					<p>Hay {{ $usuarios->total() }} registos</p>
					@include('admin.users.partials.table')
					{!! $usuarios->appends(Request::only(['name','type']))->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
{!! Form::open(['route'=>['admin.users.destroy',':USER_ID'],'method'=>'DELETE','id'=>'formDelete']) !!}	
{!! Form::close() !!}
@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).on('ready',function(){
			$(".btn-eliminar").on('click',function(e){
				e.preventDefault();
				if(confirm('Desea eliminar el registro?')){
					var $fila = $(this).parents('tr');
					var id = $fila.data('id');
					var $form = $("#formDelete");
					var url = $form.attr('action').replace(':USER_ID',id);
					var data = $form.serialize();
					$.post(url,data,function(data){
						$(".alert-success").fadeIn('fast',function(data){
							$fila.fadeOut('fast');
							setTimeout(function(){
								$(".alert-success").fadeOut('fast');
							}, 2000);
						}).html(data.message);
					});
				}
			});
		});
	</script>
@endsection
