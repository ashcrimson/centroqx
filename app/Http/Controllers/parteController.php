<?php

namespace App\Http\Controllers;

use App\DataTables\parteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateparteRequest;
use App\Http\Requests\UpdateparteRequest;
use App\Models\Paciente;
use App\Models\parte;
use Carbon\Carbon;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class parteController extends AppBaseController
{
    /**
     * Display a listing of the parte.
     *
     * @param parteDataTable $parteDataTable
     * @return Response
     */
    public function index(parteDataTable $parteDataTable)
    {
        return $parteDataTable->render('partes.index');
    }

    /**
     * Show the form for creating a new parte.
     *
     * @return Response
     */
    public function create()
    {
        return view('partes.create');
    }

    /**
     * Store a newly created parte in storage.
     *
     * @param CreateparteRequest $request
     *
     * @return Response
     */
    public function store(CreateparteRequest $request)
    {
        $input = $request->all();

        /** @var parte $parte */
        $parte = parte::create($input);

        Flash::success('Parte guardado exitosamente.');

        return redirect(route('partes.index'));
    }

    public function procesaStore(Request $request)
    {

//        DB::enableQueryLog();

        /**
         * @var  Paciente $paciente
         */
        $paciente = $this->creaOactualizaPaciente($request);

        $request->merge([
            'paciente_id' => $paciente->id     
        ]);


        /** @var Preparacion $preparacion */
        $parte = parte::create($request->all());


        return $parte;

//        dd(DB::getQueryLog());

    }

    /**
     * Display the specified parte.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var parte $parte */
        $parte = parte::find($id);

        if (empty($parte)) {
            Flash::error('Parte not found');

            return redirect(route('partes.index'));
        }

        return view('partes.show')->with('parte', $parte);
    }

    /**
     * Show the form for editing the specified parte.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var parte $parte */
        $parte = parte::find($id);

        if (empty($parte)) {
            Flash::error('Parte not found');

            return redirect(route('partes.index'));
        }

        return view('partes.edit')->with('parte', $parte);
    }

    /**
     * Update the specified parte in storage.
     *
     * @param  int              $id
     * @param UpdateparteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateparteRequest $request)
    {
        /** @var parte $parte */
        $parte = parte::find($id);

        if (empty($parte)) {
            Flash::error('Parte not found');

            return redirect(route('partes.index'));
        }

        $parte->fill($request->all());
        $parte->save();

        Flash::success('Parte actualizado con éxito.');

        return redirect(route('partes.index'));
    }

    /**
     * Remove the specified parte from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var parte $parte */
        $parte = parte::find($id);

        if (empty($parte)) {
            Flash::error('Parte not found');

            return redirect(route('partes.index'));
        }

        $parte->delete();

        Flash::success('Parte deleted successfully.');

        return redirect(route('partes.index'));
    }

    public function creaOactualizaPaciente(Request $request)
    {
        $paciente = Paciente::updateOrCreate([
            'run' => $request->run,
            'dv_run' => $request->dv_run,

        ],[
            'run' => $request->run,
            'fecha_nac' => $request->fecha_nac,
            'dv_run' => $request->dv_run,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'primer_nombre' => $request->primer_nombre,
            'segundo_nombre' => $request->segundo_nombre,

            'sexo' => $request->sexo ? 'M' : 'F',

            'direccion' => $request->direccion,
            'familiar_responsable' => $request->familiar_responsable,
            'telefono' => $request->telefono,
            'telefono2' => $request->telefono2,
            'prevision_id' => $request->prevision_id,

        ]);



        return $paciente;
    } 

    public function addAttributos(parte $parte)
    {
        $parte->setAttribute("run" ,$parte->paciente->run);
        $parte->setAttribute("dv_run" ,$parte->paciente->dv_run);
        $parte->setAttribute("apellido_paterno" ,$parte->paciente->apellido_paterno);
        $parte->setAttribute("apellido_materno" ,$parte->paciente->apellido_materno);
        $parte->setAttribute("primer_nombre" ,$parte->paciente->primer_nombre);
        $parte->setAttribute("segundo_nombre" ,$parte->paciente->segundo_nombre);
        $parte->setAttribute("fecha_nac" ,Carbon::parse($parte->paciente->fecha_nac)->format('Y-m-d'));
        $parte->setAttribute("sexo" ,$parte->paciente->sexo == 'M' ? 1 : 0);

        $parte->setAttribute("direccion" ,$parte->paciente->direccion);
        $parte->setAttribute("familiar_responsable" ,$parte->paciente->familiar_responsable);
        $parte->setAttribute("telefono" ,$parte->paciente->telefono);

        return $parte;


    }
}
