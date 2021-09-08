<?php

namespace App\Http\Controllers;

use App\DataTables\anestesiaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateanestesiaRequest;
use App\Http\Requests\UpdateanestesiaRequest;
use App\Models\anestesia;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class anestesiaController extends AppBaseController
{
    /**
     * Display a listing of the anestesia.
     *
     * @param anestesiaDataTable $anestesiaDataTable
     * @return Response
     */
    public function index(anestesiaDataTable $anestesiaDataTable)
    {
        return $anestesiaDataTable->render('anestesias.index');
    }

    /**
     * Show the form for creating a new anestesia.
     *
     * @return Response
     */
    public function create()
    {
        return view('anestesias.create');
    }

    /**
     * Store a newly created anestesia in storage.
     *
     * @param CreateanestesiaRequest $request
     *
     * @return Response
     */
    public function store(CreateanestesiaRequest $request)
    {
        $input = $request->all();

        /** @var anestesia $anestesia */
        $anestesia = anestesia::create($input);

        Flash::success('Anestesia guardado exitosamente.');

        return redirect(route('anestesias.index'));
    }

    /**
     * Display the specified anestesia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var anestesia $anestesia */
        $anestesia = anestesia::find($id);

        if (empty($anestesia)) {
            Flash::error('Anestesia not found');

            return redirect(route('anestesias.index'));
        }

        return view('anestesias.show')->with('anestesia', $anestesia);
    }

    /**
     * Show the form for editing the specified anestesia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var anestesia $anestesia */
        $anestesia = anestesia::find($id);

        if (empty($anestesia)) {
            Flash::error('Anestesia not found');

            return redirect(route('anestesias.index'));
        }

        return view('anestesias.edit')->with('anestesia', $anestesia);
    }

    /**
     * Update the specified anestesia in storage.
     *
     * @param  int              $id
     * @param UpdateanestesiaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateanestesiaRequest $request)
    {
        /** @var anestesia $anestesia */
        $anestesia = anestesia::find($id);

        if (empty($anestesia)) {
            Flash::error('Anestesia not found');

            return redirect(route('anestesias.index'));
        }

        $anestesia->fill($request->all());
        $anestesia->save();

        Flash::success('Anestesia actualizado con éxito.');

        return redirect(route('anestesias.index'));
    }

    /**
     * Remove the specified anestesia from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var anestesia $anestesia */
        $anestesia = anestesia::find($id);

        if (empty($anestesia)) {
            Flash::error('Anestesia not found');

            return redirect(route('anestesias.index'));
        }

        $anestesia->delete();

        Flash::success('Anestesia deleted successfully.');

        return redirect(route('anestesias.index'));
    }
}
