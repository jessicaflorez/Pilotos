@extends ('layouts.admin')
@section ('contenido')
@toastr_css
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Modelo(s) <a href="modelo/create"></a></h3>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">	
		@include('modelo.create')
		@include('modelo.search')

		@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif
	</div>
	@can('modelos_crear')
	<div class="col-lg-4 col-md-8 col-sm-8 col-xs-12">
		<div class="text-right">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_Modelo_Create">{{__('Nuevo')}}</button>
		</div>
	</div>
	@endcan
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover table-sm">
				<thead>
					
					<th>Id</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th class="text-center">{{__('Opciones')}}</th>
				</thead>
               @foreach ($modelos as $modelo)
				<tr>
					
					<td>{{$modelo->id}}</td>
					<td>{{$modelo->marca_marca}}</td>
					<td>{{$modelo->modelo}}</td>
					<td class="text-center">
						@can('modelos_editar')
						<a href="" data-target="#modal-edit-{{$modelo->id}}" data-toggle="modal" title="Editar datos de este registro"><button class="btn btn-info btn-sm">{{__('Editar')}}</button></a>
						@endcan
						@can('modelos_eliminar')
                        <a href="" data-target="#modal-delete-{{$modelo->id}}" data-toggle="modal" title="Eliminar este registro"><button class="btn btn-danger btn-sm">{{__('Eliminar')}}</button></a>
                        @endcan
                        <a href="" data-target="#modal-ver-{{$modelo->id}}" data-toggle="modal" title="Ver datos de este registro"><button class="btn btn-success btn-sm">{{__('Ver')}}</button></a>
					</td>
				</tr>
				@include('modelo.modal')
				@include('modelo.edit')
				@include('modelo.show')
				@endforeach
			</table>
		</div>
		{{$modelos->render()}}
	</div>
</div>
@jquery 
@toastr_js
@toastr_render
@endsection