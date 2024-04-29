<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $table = "medicos";
    protected $primaryKey='id';
    
    protected $fillable = ["nombres","apellidos","id_establecimiento"
    ];
    public $timestamps = true;

    public function establecimiento(){
        return $this->belongsTo(Establecimiento::class, 'id_establecimiento','id');
    }
}
