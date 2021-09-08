<?php

namespace App\Http\Controllers;

use App\DataTables\diagnosticoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatediagnosticoRequest;
use App\Http\Requests\UpdatediagnosticoRequest;
use App\Models\diagnostico;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class diagnosticoController extends AppBaseController
{
    /**
     * Display a listing of the diagnostico.
     *
     * @param diagnosticoDataTable $diagnosticoDataTable
     * @return Response
     */
    public function index(diagnosticoDataTable $diagnosticoDataTable)
    {
        return $diagnosticoDataTable->render('diagnosticos.index');
    }

    /**
     * Show the form for creating a new diagnostico.
     *
     * @return Response
     */
    public function create()
    {
        return view('diagnosticos.create');
    }

    /**
     * Store a newly created diagnostico in storage.
     *
     * @param CreatediagnosticoRequest $request
     *
     * @return Response
     */
    public function store(CreatediagnosticoRequest $request)
    {
        $input = $request->all();

        /** @var diagnostico $diagnostico */
        $diagnostico = diagnostico::create($input);

        Flash::success('Diagnostico guardado exitosamente.');

        return redirect(route('diagnosticos.index'));
    }

    /**
     * Display the specified diagnostico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var diagnostico $diagnostico */
        $diagnostico = diagnostico::find($id);

        if (empty($diagnostico)) {
            Flash::error('Diagnostico not found');

            return redirect(route('diagnosticos.index'));
        }

        return view('diagnosticos.show')->with('diagnostico', $diagnostico);
    }

    /**
     * Show the form for editing the specified diagnostico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var diagnostico $diagnostico */
        $diagnostico = diagnostico::find($id);

        if (empty($diagnostico)) {
            Flash::error('Diagnostico not found');

            return redirect(route('diagnosticos.index'));
        }

        return view('diagnosticos.edit')->with('diagnostico', $diagnostico);
    }

    /**
     * Update the specified diagnostico in storage.
     *
     * @param  int              $id
     * @param UpdatediagnosticoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatediagnosticoRequest $request)
    {
        /** @var diagnostico $diagnostico */
        $diagnostico = diagnostico::find($id);

        if (empty($diagnostico)) {
            Flash::error('Diagnostico not found');

            return redirect(route('diagnosticos.index'));
        }

        $diagnostico->fill($request->all());
        $diagnostico->save();

        Flash::success('Diagnostico actualizado con éxito.');

        return redirect(route('diagnosticos.index'));
    }

    /**
     * Remove the specified diagnostico from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var diagnostico $diagnostico */
        $diagnostico = diagnostico::find($id);

        if (empty($diagnostico)) {
            Flash::error('Diagnostico not found');

            return redirect(route('diagnosticos.index'));
        }

        $diagnostico->delete();

        Flash::success('Diagnostico deleted successfully.');

        return redirect(route('diagnosticos.index'));
    }
}
