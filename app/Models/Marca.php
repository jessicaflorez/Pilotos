<?php

//namespace Pilotos2;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table='marca';

    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable =[
    	'id','marca'
    ];

    protected $guarded =[

    ];
}
