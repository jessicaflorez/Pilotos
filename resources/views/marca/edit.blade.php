<div class="modal fade" id="modal-edit-{{$marca->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_marca_Edit_Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_marca_Edit_LongTitle">{{__('Editar')}} Marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!!Form::model($marca,['method'=>'PATCH','files'=>'true','route'=>['marca.update',$marca->id]])!!}
      {{Form::token()}}
      <div class="modal-body">
          <div class="row">
            
            
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="marca">Marca(*)</label>
	            	<input type="text" name="marca" class="form-control" value="{{$marca->marca}}" placeholder="Marca(*)..." required>
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