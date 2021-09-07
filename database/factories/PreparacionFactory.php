<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Preparacion;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Preparacion::class, function (Faker $faker) {

    $fechaValides = Carbon::now()->addDays(rand(30,60));

    return [
        'fecha_admision' => $faker->date('Y-m-d H:i:s'),
        'fecha_elaboracion' => $faker->date('Y-m-d H:i:s'),
        'fecha_validez' => $fechaValides->format("Y-m-d"),
        'paciente_id' => \App\Models\Paciente::all()->random()->id,
        'profesional_a_cargo' => $faker->word,
        'responsable_id' => \App\Models\Empleado::quimico()->get()->random()->id,
        'droga_id' => \App\Models\Droga::all()->random()->id,
        'dosis' => $faker->randomDigitNotZero(),
        'dilucion_id' => \App\Models\Dilucion::all()->random()->id,
        'volumen_suero' => $faker->randomElement([0,100,250,500,1000]),
        'volumen_agregado' => $faker->randomDigitNotZero(),
        'volumen_final' => $faker->randomDigitNotZero(),
        'bajada' => $faker->randomElement(["venotek","ON-70","Hospira","Jeringa","Cassette"]),
        'medico_id' => \App\Models\Empleado::medico()->get()->random()->id,
        'ten_id' => \App\Models\Empleado::ten()->get()->random()->id,
        'servicio_id' => \App\Models\Servicio::all()->random()->id,
        'protocolo_id' => \App\Models\Protocolo::all()->random()->id,
        'ciclo' => $faker->word,
        'dia' => $faker->dayOfWeek,
        'control_producto_terminado' => $faker->text,
        'entrega_conforme_enfermeria' => $faker->text,
        'refrigerar' => rand(0,1),
        'proteger_luz' => rand(0,1),
        'user_id' => \App\Models\User::all()->random()->id,
        'estado_id' => \App\Models\PreparacionEstado::all()->random()->id,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
    ];
});
