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
 * @property string $rut_paciente
 * @property string $nombre_paciente
 * @property string $apellido_paciente
 * @property string $telefono_paciente
 * @property number $edad_paciente
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
        'rut_paciente',
        'nombre_paciente',
        'apellido_paciente',
        'telefono_paciente',
        'edad_paciente',
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
        'observaciones'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'rut_paciente' => 'string',
        'nombre_paciente' => 'string',
        'apellido_paciente' => 'string',
        'telefono_paciente' => 'string',
        'edad_paciente' => 'decimal:2',
        'tipo_cirugia' => 'string',
        'especialidad' => 'string',
        'diagnostico' => 'string',
        'otro_diagnostico' => 'string',
        'intervencion' => 'string',
        'lateralidad' => 'string',
        'otra_intervencion' => 'string',
        'cma' => 'string',
        'anestecia_sugerida' => 'string',
        'aislamiento' => 'boolean',
        'alergia_latex' => 'boolean',
        'usuario_taco' => 'boolean',
        'necesidad_cama_upc' => 'boolean',
        'prioridad' => 'boolean',
        'necesita_donantes_sangre' => 'boolean',
        'evaluacion_preanestesica' => 'boolean',
        'equipo_rayos' => 'boolean',
        'insumos_especificos' => 'boolean',
        'ex_preoperatorios' => 'string',
        'biopsia' => 'boolean',
        'instrumental' => 'string',
        'observaciones' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
