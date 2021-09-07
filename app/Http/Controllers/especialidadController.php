<?php

namespace App\Http\Controllers;

use App\DataTables\especialidadDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateespecialidadRequest;
use App\Http\Requests\UpdateespecialidadRequest;
use App\Models\especialidad;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class especialidadController extends AppBaseController
{
    /**
     * Display a listing of the especialidad.
     *
     * @param especialidadDataTable $especialidadDataTable
     * @return Response
     */
    public function index(especialidadDataTable $especialidadDataTable)
    {
        return $especialidadDataTable->render('especialidads.index');
    }

    /**
     * Show the form for creating a new especialidad.
     *
     * @return Response
     */
    public function create()
    {
        return view('especialidads.create');
    }

    /**
     * Store a newly created especialidad in storage.
     *
     * @param CreateespecialidadRequest $request
     *
     * @return Response
     */
    public function store(CreateespecialidadRequest $request)
    {
        $input = $request->all();

        /** @var especialidad $especialidad */
        $especialidad = especialidad::create($input);

        Flash::success('Especialidad guardado exitosamente.');

        return redirect(route('especialidads.index'));
    }

    /**
     * Display the specified especialidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var especialidad $especialidad */
        $especialidad = especialidad::find($id);

        if (empty($especialidad)) {
            Flash::error('Especialidad not found');

            return redirect(route('especialidads.index'));
        }

        return view('especialidads.show')->with('especialidad', $especialidad);
    }

    /**
     * Show the form for editing the specified especialidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var especialidad $especialidad */
        $especialidad = especialidad::find($id);

        if (empty($especialidad)) {
            Flash::error('Especialidad not found');

            return redirect(route('especialidads.index'));
        }

        return view('especialidads.edit')->with('especialidad', $especialidad);
    }

    /**
     * Update the specified especialidad in storage.
     *
     * @param  int              $id
     * @param UpdateespecialidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateespecialidadRequest $request)
    {
        /** @var especialidad $especialidad */
        $especialidad = especialidad::find($id);

        if (empty($especialidad)) {
            Flash::error('Especialidad not found');

            return redirect(route('especialidads.index'));
        }

        $especialidad->fill($request->all());
        $especialidad->save();

        Flash::success('Especialidad actualizado con éxito.');

        return redirect(route('especialidads.index'));
    }

    /**
     * Remove the specified especialidad from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var especialidad $especialidad */
        $especialidad = especialidad::find($id);

        if (empty($especialidad)) {
            Flash::error('Especialidad not found');

            return redirect(route('especialidads.index'));
        }

        $especialidad->delete();

        Flash::success('Especialidad deleted successfully.');

        return redirect(route('especialidads.index'));
    }
}
