<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class diagnostico
 * @package App\Models
 * @version September 8, 2021, 12:13 pm CST
 *
 * @property string $codigo
 * @property string $descripcion
 */
class diagnostico extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'diagnosticos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'codigo',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'codigo' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'codigo' => 'required',
        'descripcion' => 'required'
    ];

    
}
