<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Marca;
use App\Models\Modelo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente
use App\Http\Requests\ModeloFormRequest;
use DB;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class ModeloControlador extends Controller
{
    public function __construct(){
        
    }
    public function index(Request $request){
        $marcas=Marca::where('user_id',auth()->user()->id)->get();
        if ($request){
            $query=trim($request->get('searchText'));
            if(auth()->user()->hasRole('Administrador')){
                $modelos=Modelo::join('marca','modelo.marca_id','=','marca.id')
                    ->where('modelo.modelo','like','%'.$query.'%')
                    ->orWhere('marca.marca','like','%'.$query.'%')
                    ->select('modelo.id','modelo.marca_id','modelo.modelo','marca.marca as marca_marca')
                    ->paginate(10);
            }else{
                $modelos=Modelo::join('marca','modelo.marca_id','=','marca.id')
                ->where('modelo.user_id',auth()->user()->id)
                ->where('modelo.modelo','like','%'.$query.'%')
                ->select('modelo.id','modelo.marca_id','modelo.modelo','marca.marca as marca_marca')
                ->paginate(10);
            }
            return view('modelo.index',["modelos"=>$modelos,"searchText"=>$query,"marcas"=>$marcas]);
        }
    }

    public function create(){
        $hoy=Carbon::now();
        return view("modelo.create",["hoy"=>$hoy]);
    }
    public function store (ModeloFormRequest $request){
        try{
            $modelo=new Modelo;
            $modelo->marca_id=$request->get('marca_id');
            $modelo->modelo=$request->get('modelo');
            $modelo->user_id = auth()->user()->id;
            $modelo->save();
            toastr()->success(__('Grabación exitosa...'));
        }catch(\Exception $e){
            DB::rollback(); // en caso de error anulo transaccion
            toastr()->error(__('La grabación NO ha sido exitosa'));
        }
        return Redirect::to('modelo');
    }
    public function show($id){
        $modelo=Modelo::findOrFail($id);
        $this->authorize('pass', $modelo);

        return view("modelo.show",["modelo"=>$modelo]);
    }
    public function edit($id){
        $modelo=Modelo::findOrFail($id);
        $this->authorize('pass', $modelo);

        return view("modelo.edit",["modelo"=>$modelo]);
    }
    public function update(ModeloFormRequest $request,$id){
        try{
            $modelo=Modelo::findOrFail($id);
            $this->authorize('pass', $modelo);

    		$modelo->marca_id = $request->get('marca_id');
            $modelo->modelo = $request->get('modelo');
            $modelo->update();
            toastr()->success(__('Actualización exitosa...'));
        }catch(\Exception $e){
            DB::rollback(); // en caso de error anulo transaccion
            toastr()->error(__('La actualización NO ha sido exitosa'));
        }  
        return Redirect::to('modelo');
    }
    public function destroy($id){
        try{
            DB::beginTransaction();
            $modelo=Modelo::findOrFail($id);
            $this->authorize('pass', $modelo);

            $modelo->delete();
            DB::commit();
            toastr()->success(__('Eliminación exitosa...'));
        }catch(\Exception $e){
            DB::rollback(); // en caso de error anulo transaccion
            toastr()->error(__('La eliminacion NO ha sido exitosa'));
        }
        return Redirect::to('modelo');
    }
    public function grafico(){
        $modelos=Modelo::join('marca','modelo.marca_id','=','marca.id')
                ->where('modelo.user_id',auth()->user()->id)
                ->select('marca.marca',DB::raw('count(*) as valor'))
                ->groupBy('marca.marca')
                ->get();
        return view("modelo.grafico",compact('modelos'));
    }
}
