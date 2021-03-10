<div class="modal fade" id="modal-delete-{{$marca->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  {{Form::Open(array('action'=>array('App\Http\Controllers\MarcaControlador@destroy',$marca->id),'method'=>'delete'))}}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('Eliminar')}} Marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Confirme si desea Eliminar Marca</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Cerrar')}}</button>
		<button type="submit" class="btn btn-primary">{{__('Confirmar')}}</button>
      </div>
    </div>
  </div>
  {{Form::Close()}}
</div>