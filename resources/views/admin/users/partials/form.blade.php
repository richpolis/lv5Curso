						<div class="form-group">
							{!! Form::label('email','Correo electronico') !!}
							{!! Form::text('email',null, ['class'=>'form-control','placeholder'=>'tu@correo.com']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('password','Contraseña') !!}
							{!! Form::password('password', ['class'=>'form-control','placeholder'=>'contraseña']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('first_name','Nombre') !!}
							{!! Form::text('first_name',null, ['class'=>'form-control','placeholder'=>'nombre']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('last_name','Apellido') !!}
							{!! Form::text('last_name',null, ['class'=>'form-control','placeholder'=>'apellidos']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('type','Tipo de usuario') !!}
							{!! Form::select('type',config('options.types'), null, ['class'=>'form-control']) !!}
						</div>