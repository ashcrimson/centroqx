<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Preparacion
 * @package App\Models
 * @version August 9, 2021, 10:29 am CST
 *
 * @property \App\Models\Dilucion $dilucion
 * @property \App\Models\Droga $droga
 * @property \App\Models\Empleado $responsable
 * @property \App\Models\Empleado $medico
 * @property \App\Models\Paciente $paciente
 * @property \App\Models\PreparacionEstado $estado
 * @property \App\Models\Protocolo $protocolo
 * @property \App\Models\Servicio $servicio
 * @property \App\Models\User $user
 * @property string|\Carbon\Carbon $fecha_admision
 * @property string|\Carbon\Carbon $fecha_validez
 * @property integer $paciente_id
 * @property string $profesional_a_cargo
 * @property integer $responsable_id
 * @property integer $droga_id
 * @property number $dosis
 * @property integer $dilucion_id
 * @property number $volumen_suero
 * @property number $volumen_agregado
 * @property number $volumen_final
 * @property string $bajada
 * @property integer $medico_id
 * @property integer $ten_id
 * @property integer $servicio_id
 * @property integer $protocolo_id
 * @property string $ciclo
 * @property string $dia
 * @property string $control_producto_terminado
 * @property string $entrega_conforme_enfermeria
 * @property boolean $refrigerar
 * @property boolean $proteger_luz
 * @property integer $user_id
 * @property integer $estado_id
 * @property boolean $cerrada
 */
class Preparacion extends Model
{
    use SoftDeletes;

    public $table = 'preparaciones';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'fecha_admision',
        'fecha_validez',
        'paciente_id',
        'profesional_a_cargo',
        'responsable_id',
        'droga_id',
        'dosis',
        'dilucion_id',
        'volumen_suero',
        'volumen_agregado',
        'volumen_final',
        'bajada',
        'medico_id',
        'ten_id',
        'servicio_id',
        'protocolo_id',
        'ciclo',
        'dia',
        'control_producto_terminado',
        'entrega_conforme_enfermeria',
        'refrigerar',
        'proteger_luz',
        'user_id',
        'estado_id',
        'cerrada',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'paciente_id' => 'integer',
        'profesional_a_cargo' => 'string',
        'responsable_id' => 'integer',
        'droga_id' => 'integer',
        'dosis' => 'decimal:2',
        'dilucion_id' => 'integer',
        'volumen_suero' => 'integer',
        'volumen_agregado' => 'decimal:2',
        'volumen_final' => 'decimal:2',
        'bajada' => 'string',
        'medico_id' => 'integer',
        'ten_id' => 'integer',
        'servicio_id' => 'integer',
        'protocolo_id' => 'integer',
        'ciclo' => 'string',
        'dia' => 'string',
        'control_producto_terminado' => 'string',
        'entrega_conforme_enfermeria' => 'string',
        'user_id' => 'integer',
        'estado_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha_admision' => 'required',
        'fecha_validez' => 'required',
        'responsable_id' => 'required',
        'droga_id' => 'required',
        'dosis' => 'required|numeric',
        'dilucion_id' => 'required',
        'volumen_suero' => 'required|numeric',
        'volumen_agregado' => 'required|numeric',
        'volumen_final' => 'nullable|numeric',
        'bajada' => 'required|string|max:255',
        'medico_id' => 'required',
        'servicio_id' => 'required',
        'protocolo_id' => 'required',
        'ciclo' => 'nullable|string|max:255',
        'dia' => 'nullable|string|max:255',
        'control_producto_terminado' => 'nullable|string',
        'entrega_conforme_enfermeria' => 'nullable|string',
        'refrigerar' => 'nullable|boolean',
        'proteger_luz' => 'nullable|boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dilucion()
    {
        return $this->belongsTo(\App\Models\Dilucion::class, 'dilucion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function droga()
    {
        return $this->belongsTo(\App\Models\Droga::class, 'droga_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function responsable()
    {
        return $this->belongsTo(\App\Models\Empleado::class, 'responsable_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function medico()
    {
        return $this->belongsTo(\App\Models\Empleado::class, 'medico_id');
    }

    public function ten()
    {
        return $this->belongsTo(\App\Models\Empleado::class, 'ten_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paciente()
    {
        return $this->belongsTo(\App\Models\Paciente::class, 'paciente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estado()
    {
        return $this->belongsTo(\App\Models\PreparacionEstado::class, 'estado_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function protocolo()
    {
        return $this->belongsTo(\App\Models\Protocolo::class, 'protocolo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function servicio()
    {
        return $this->belongsTo(\App\Models\Servicio::class, 'servicio_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * @return bool
     */
    public function puedeEditar()
    {
        return !$this->cerrada;
    }
}
