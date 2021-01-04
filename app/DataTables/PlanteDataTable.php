<?php

namespace App\DataTables;

use App\Models\Plante;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PlanteDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'plantes.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Plante $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Plante $model)
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
            ->addAction(['width' => '100px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                   /* ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],*/
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                   /* ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],*/
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
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
            'nomScientifique',
            'espece',
            'famille',
            'nomMoore',
            'nomDioula',
            'nomFulfulde',
            'enDanger',
            'photo',
            'zoneRencontrees'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'plantesdatatable_' . time();
    }
}
