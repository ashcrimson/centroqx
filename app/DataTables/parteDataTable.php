<?php

namespace App\DataTables;

use App\Models\parte;
use Carbon\Carbon;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class parteDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

       return $dataTable->addColumn('action', function(parte $parte){

                 $id = $parte->id;

                 return view('partes.datatables_actions',compact('parte','id'))->render();
             })
             ->editColumn('id',function (parte $parte){

                 return $parte->id;

                 //se debe crear la vista modal_detalles
                 //return view('partes.modal_detalles',compact('parte'))->render();

             })
             ->rawColumns(['action','id']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\parte $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(parte $model)
    {
        return $model->newQuery()->with(['paciente']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'     => 'Bfltrip',
                'order'   => [[0, 'desc']],
                'language' => ['url' => asset('js/SpanishDataTables.json')],
                //'scrollX' => false,
                'responsive' => true,
                'buttons' => [
                   
                    
                    ['extend' => 'reset', 'text' => '<i class="fa fa-undo"></i> <span class="d-none d-sm-inline">Reiniciar</span>'],
                    ['extend' => 'export', 'text' => '<i class="fa fa-download"></i> <span class="d-none d-sm-inline">Exportar</span>'],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'paciente.rut_completo',
            'paciente.nombre_completo',
            'paciente.fecha_nac',
            'paciente.sexo',
            'tipo_cirugia',
            'especialidad',
            'diagnostico',
            'otro_diagnostico',
            'intervencion',
            'lateralidad',
            'otra_intervencion',
            'cma',
            'clasificacion_asa',
            'tiempo_quirurgico',
            'anestecia_sugerida',
            'aislamiento',
            'alergia_latex',
            'usuario_taco',
            'necesidad_cama_upc',
            'prioridad',
            'necesita_donantes_sangre',
            'evaluacion_preanestesica',
            'equipo_rayos',
            'insumos_especificos',
            'ex_preoperatorios',
            'biopsia',
            'instrumental',
            'medicamentos',
            'observaciones',

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'partesdatatable_' . time();
    }
}
