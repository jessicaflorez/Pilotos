<div class="modal fade" id="modal-edit-{{$modelo->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_modelo_Edit_Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_modelo_Edit_LongTitle">{{__('Editar')}} Modelo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!!Form::model($modelo,['method'=>'PATCH','files'=>'true','route'=>['modelo.update',$modelo->id]])!!}
      {{Form::token()}}
      <div class="modal-body">
          <div class="row">
            
            
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Marca(*)</label>
    				<select name="marca_id" class="form-control" required>
                        <option value="">Seleccionar Marca</option>
    					@foreach ($marcas as $marca)
                            <option 
    							@if ($marca->id==$modelo->marca_id)
                                    selected
    							@endif
    							value="{{$marca->id}}"> {{$marca->marca}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="modelo">Modelo(*)</label>
	            	<input type="text" name="modelo" class="form-control" value="{{$modelo->modelo}}" placeholder="Modelo(*)..." required>
	            </div>
            </div>

          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">{{__('Guardar')}}</button>
        <button class="btn btn-danger" type="reset">{{__('Cancelar')}}</button>
      </div>
      {!!Form::close()!!} 
    </div>
  </div>
</div>