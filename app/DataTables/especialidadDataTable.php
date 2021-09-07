<?php

namespace App\DataTables;

use App\Models\especialidad;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class especialidadDataTable extends DataTable
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

       return $dataTable->addColumn('action', function(especialidad $especialidad){

                 $id = $especialidad->id;

                 return view('especialidads.datatables_actions',compact('especialidad','id'))->render();
             })
             ->editColumn('id',function (especialidad $especialidad){

                 return $especialidad->id;

                 //se debe crear la vista modal_detalles
                 //return view('especialidads.modal_detalles',compact('especialidad'))->render();

             })
             ->rawColumns(['action','id']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\especialidad $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(especialidad $model)
    {
        return $model->newQuery();
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
                    ['extend' => 'create', 'text' => '<i class="fa fa-plus"></i> <span class="d-none d-sm-inline">Crear</span>'],
                    ['extend' => 'print', 'text' => '<i class="fa fa-print"></i> <span class="d-none d-sm-inline">Imprimir</span>'],
                    ['extend' => 'reload', 'text' => '<i class="fa fa-sync-alt"></i> <span class="d-none d-sm-inline">Recargar</span>'],
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
            'descripcion'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'especialidadsdatatable_' . time();
    }
}
