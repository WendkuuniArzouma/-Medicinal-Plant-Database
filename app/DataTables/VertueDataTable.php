<?php

namespace App\DataTables;

use App\Models\Vertue;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class VertueDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'vertues.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Vertue $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Vertue $model)
    {
        return $model->newQuery()->with(['plante','partieutilisee','regionpratiquee']);
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
            'nomVertue',
            'recette',
            'utilisation',
            'plante_id' => new Column([ 'title' => 'Plante', 'data' => 'plante.nomScientifique']),
            'regionPratiquee_id' => new Column([ 'title' => 'Region Pratiquée', 'data' => 'regionpratiquee.nomRegion']),
            'partieUtilisee_id' => new Column([ 'title' => 'Partie utilisée', 'data' => 'partieutilisee.nomPartie'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'vertuesdatatable_' . time();
    }
}
