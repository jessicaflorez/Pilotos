<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Marca;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;   // para subir la imagen desde la maquina del cliente
use App\Http\Requests\MarcaFormRequest;
use DB;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class MarcaControlador extends Controller
{
    public function __construct(){
        
    }
    public function index(Request $request){
        
        if ($request){
            $query=trim($request->get('searchText'));
            //dd(auth()->user()->hasRole('Administrador'));
            if(auth()->user()->hasRole('Administrador')){
                $marcas=Marca::where('marca','like','%'.$query.'%')
                    ->paginate(10);
            }else{
                $marcas=Marca::where('user_id',auth()->user()->id)
                    ->where('marca','like','%'.$query.'%')
                    ->paginate(10);
            }
            return view('marca.index',["marcas"=>$marcas,"searchText"=>$query,]);
        }
    }
    public function report(Request $request){
        if ($request){
            $marcas=DB::table('marca')
            
            ->paginate(1000);
            return view('marca.report',["marcas"=>$marcas]);
        }
    }
    public function create(){
        $hoy=Carbon::now();
        return view("marca.create",["hoy"=>$hoy,]);
    }
    public function store (MarcaFormRequest $request){
        try{
            $marca=new Marca;
            $marca->marca=$request->get('marca');
            $marca->user_id = auth()->user()->id;
            $marca->save();
            toastr()->success(__('Grabación exitosa...'));
        }catch(\Exception $e){
            DB::rollback(); // en caso de error anulo transaccion
            toastr()->error(__('La grabación NO ha sido exitosa'));
        }
        return Redirect::to('marca');
    }
    public function show($id){
        $marca=Marca::findOrFail($id);
        $this->authorize('pass', $marca);
        return view("marca.show",["marca"=>$marca]);
    }
    public function edit($id){
        $marca=Marca::findOrFail($id);
        $this->authorize('pass', $marca);

        return view("marca.edit",["marca"=>$marca]);
    }
    public function update(MarcaFormRequest $request,$id){
        try{
            $marca=Marca::findOrFail($id);
            $this->authorize('pass', $marca);

    		$marca->marca = $request->get('marca');
            $marca->update();
            toastr()->success(__('Actualización exitosa...'));
        }catch(\Exception $e){
            DB::rollback(); // en caso de error anulo transaccion
            toastr()->error(__('La actualización NO ha sido exitosa'));
        }  
        return Redirect::to('marca');
    }
    public function destroy($id){
        try{
            DB::beginTransaction();
            $marca=Marca::findOrFail($id);
            $this->authorize('pass', $marca);

            $marca->delete();
            DB::commit();
            toastr()->success(__('Eliminación exitosa...'));
        }catch(\Exception $e){
            DB::rollback(); // en caso de error anulo transaccion
            toastr()->error(__('La eliminacion NO ha sido exitosa'));
        }
        return Redirect::to('marca');
    }
}
