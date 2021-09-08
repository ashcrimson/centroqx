<?php

namespace Database\Factories;

use App\Models\parte;
use Illuminate\Database\Eloquent\Factories\Factory;

class parteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = parte::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rut_paciente' => $this->faker->word,
        'nombre_paciente' => $this->faker->word,
        'apellido_paciente' => $this->faker->word,
        'telefono_paciente' => $this->faker->word,
        'edad_paciente' => $this->faker->word,
        'tipo_cirugia' => $this->faker->word,
        'especialidad' => $this->faker->word,
        'diagnostico' => $this->faker->word,
        'otro_diagnostico' => $this->faker->word,
        'intervencion' => $this->faker->word,
        'lateralidad' => $this->faker->word,
        'otra_intervencion' => $this->faker->word,
        'cma' => $this->faker->word,
        'clasificacion_asa' => $this->faker->word,
        'tiempo_quirurgico' => $this->faker->word,
        'anestecia_sugerida' => $this->faker->word,
        'aislamiento' => $this->faker->word,
        'alergia_latex' => $this->faker->word,
        'usuario_taco' => $this->faker->word,
        'necesidad_cama_upc' => $this->faker->word,
        'prioridad' => $this->faker->word,
        'necesita_donantes_sangre' => $this->faker->word,
        'evaluacion_preanestesica' => $this->faker->word,
        'equipo_rayos' => $this->faker->word,
        'insumos_especificos' => $this->faker->word,
        'ex_preoperatorios' => $this->faker->word,
        'biopsia' => $this->faker->word,
        'instrumental' => $this->faker->word,
        'observaciones' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
