<!-- marca show.blade.php    Ver Detalle de Marca -->
<div class="modal fade" id="modal-ver-{{$marca->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_marca_Ver_Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_marca_Ver_LongTitle">Detalle de Marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!!Form::model($marca,['method'=>'GET','route'=>['marca.index']])!!}
      {{Form::token()}}
      <div class="modal-body">
          <div class="row">
            
            
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="marca">Marca(*)</label>
	            	<input type="text" name="marca" class="form-control" value="{{$marca->marca}}" disabled>
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