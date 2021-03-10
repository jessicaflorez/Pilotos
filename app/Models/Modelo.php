<?php

//namespace Pilotos2;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table='modelo';

    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable =[
    	'id','marca_id','modelo'
    ];

    protected $guarded =[

    ];
}
