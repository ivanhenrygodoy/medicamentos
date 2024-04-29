<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receta_medicamento extends Model
{
    use HasFactory;
    protected $table = "receta_medicamentos";
    protected $primaryKey='id';
    
    protected $fillable = [
        "cantidad","dosis","indicaciones","id_receta","id_medicamento"
    ];

    public $timestamps = true;

    public function receta(){
        return $this->belongsTo(Receta::class, 'id_receta','id');
    }

    public function medicamento(){
        return $this->belongsTo(Medicamento::class, 'id_medicamento','id');
    }
}
