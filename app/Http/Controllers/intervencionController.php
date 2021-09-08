<?php

namespace App\Http\Controllers;

use App\DataTables\intervencionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateintervencionRequest;
use App\Http\Requests\UpdateintervencionRequest;
use App\Models\intervencion;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class intervencionController extends AppBaseController
{
    /**
     * Display a listing of the intervencion.
     *
     * @param intervencionDataTable $intervencionDataTable
     * @return Response
     */
    public function index(intervencionDataTable $intervencionDataTable)
    {
        return $intervencionDataTable->render('intervencions.index');
    }

    /**
     * Show the form for creating a new intervencion.
     *
     * @return Response
     */
    public function create()
    {
        return view('intervencions.create');
    }

    /**
     * Store a newly created intervencion in storage.
     *
     * @param CreateintervencionRequest $request
     *
     * @return Response
     */
    public function store(CreateintervencionRequest $request)
    {
        $input = $request->all();

        /** @var intervencion $intervencion */
        $intervencion = intervencion::create($input);

        Flash::success('Intervencion guardado exitosamente.');

        return redirect(route('intervencions.index'));
    }

    /**
     * Display the specified intervencion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var intervencion $intervencion */
        $intervencion = intervencion::find($id);

        if (empty($intervencion)) {
            Flash::error('Intervencion not found');

            return redirect(route('intervencions.index'));
        }

        return view('intervencions.show')->with('intervencion', $intervencion);
    }

    /**
     * Show the form for editing the specified intervencion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var intervencion $intervencion */
        $intervencion = intervencion::find($id);

        if (empty($intervencion)) {
            Flash::error('Intervencion not found');

            return redirect(route('intervencions.index'));
        }

        return view('intervencions.edit')->with('intervencion', $intervencion);
    }

    /**
     * Update the specified intervencion in storage.
     *
     * @param  int              $id
     * @param UpdateintervencionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateintervencionRequest $request)
    {
        /** @var intervencion $intervencion */
        $intervencion = intervencion::find($id);

        if (empty($intervencion)) {
            Flash::error('Intervencion not found');

            return redirect(route('intervencions.index'));
        }

        $intervencion->fill($request->all());
        $intervencion->save();

        Flash::success('Intervencion actualizado con éxito.');

        return redirect(route('intervencions.index'));
    }

    /**
     * Remove the specified intervencion from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var intervencion $intervencion */
        $intervencion = intervencion::find($id);

        if (empty($intervencion)) {
            Flash::error('Intervencion not found');

            return redirect(route('intervencions.index'));
        }

        $intervencion->delete();

        Flash::success('Intervencion deleted successfully.');

        return redirect(route('intervencions.index'));
    }
}
