<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Diagnostico
 * @package App\Models
 * @version September 7, 2021, 1:23 pm CST
 *
 * @property string $descrpicon
 */
class Diagnostico extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'diagnosticos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'descrpicon'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descrpicon' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'descrpicon' => 'required'
    ];

    
}
