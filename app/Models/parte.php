<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class parte
 * @package App\Models
 * @version September 8, 2021, 1:42 pm CST
 *
 * @property \App\Models\Paciente $paciente
 * @property integer $paciente_id
 * @property string $tipo_cirugia
 * @property string $especialidad
 * @property string $diagnostico
 * @property string $otro_diagnostico
 * @property string $intervencion
 * @property string $lateralidad
 * @property string $otra_intervencion
 * @property string $cma
 * @property select $clasificacion_asa
 * @property number $tiempo_quirurgico
 * @property string $anestecia_sugerida
 * @property boolean $aislamiento
 * @property boolean $alergia_latex
 * @property boolean $usuario_taco
 * @property boolean $necesidad_cama_upc
 * @property boolean $prioridad
 * @property boolean $necesita_donantes_sangre
 * @property boolean $evaluacion_preanestesica
 * @property boolean $equipo_rayos
 * @property boolean $insumos_especificos
 * @property string $ex_preoperatorios
 * @property boolean $biopsia
 * @property string $instrumental
 * @property string $observaciones
 */
class parte extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'partes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'paciente_id',
        'tipo_cirugia',
        'especialidad',
        'diagnostico',
        'otro_diagnostico',
        'intervencion',
        'lateralidad',
        'otra_intervencion',
        'cma',
        'clasificacion_asa',
        'tiempo_quirurgico',
        'anestecia_sugerida',
        'aislamiento',
        'alergia_latex',
        'usuario_taco',
        'necesidad_cama_upc',
        'prioridad',
        'necesita_donantes_sangre',
        'evaluacion_preanestesica',
        'equipo_rayos',
        'insumos_especificos',
        'ex_preoperatorios',
        'biopsia',
        'instrumental',
        'medicamentos',
        'observaciones'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'paciente_id' => 'integer',
        'especialidad' => 'string',
        'diagnostico' => 'string',
        'otro_diagnostico' => 'string',
        'intervencion' => 'string',
        'lateralidad' => 'string',
        'otra_intervencion' => 'string',
        'cma' => 'string',
        'anestecia_sugerida' => 'string',
        'aislamiento' => 'string',
        'alergia_latex' => 'string',
        'usuario_taco' => 'string',
        'necesidad_cama_upc' => 'string',
        'prioridad' => 'string',
        'necesita_donantes_sangre' => 'string',
        'evaluacion_preanestesica' => 'string',
        'equipo_rayos' => 'string',
        'insumos_especificos' => 'string',
        'ex_preoperatorios' => 'string',
        'biopsia' => 'string',
        'instrumental' => 'string',
        'medicamentos' => 'string',
        'observaciones' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'clasificacion_asa'=>'nullable',
        'medicamentos'=>'nullable',
        'observaciones'=>'nullable'
    ];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paciente()
    {
        return $this->belongsTo(\App\Models\Paciente::class, 'paciente_id');
    }

 
    
}
