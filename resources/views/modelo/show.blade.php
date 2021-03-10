<!-- modelo show.blade.php    Ver Detalle de Modelo -->
<div class="modal fade" id="modal-ver-{{$modelo->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_modelo_Ver_Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_modelo_Ver_LongTitle">Detalle de Modelo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!!Form::model($modelo,['method'=>'GET','route'=>['modelo.index']])!!}
      {{Form::token()}}
      <div class="modal-body">
          <div class="row">
            
            
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Marca(*)</label>
                    <select name="marca_id" class="form-control" disabled>
                        <option value="" ></option>
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
	            	<input type="text" name="modelo" class="form-control" value="{{$modelo->modelo}}" disabled>
	            </div>
            </div>

		  </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger" data-dismiss="modal" title="Regresar al Listado Anterior">{{__('Volver')}}</a>
      </div>
      {!!Form::close()!!} 
    </div>
  </div>
</div>