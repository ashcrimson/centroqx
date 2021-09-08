<?php

namespace App\Http\Controllers;

use App\DataTables\parteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateparteRequest;
use App\Http\Requests\UpdateparteRequest;
use App\Models\parte;
use Flash;
use App\Http\Controllers\AppBaseController;
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
}
