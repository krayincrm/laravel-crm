<?php

namespace Webkul\Admin\DataGrids\Settings\Marketing;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class CampaignDatagrid extends DataGrid
{
    /**
     * Prepare query builder.
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('marketing_campaigns')
            ->addSelect(
                'marketing_campaigns.id',
                'marketing_campaigns.name',
                'marketing_campaigns.subject',
                'marketing_campaigns.type',
            );

        $this->addFilter('id', 'marketing_campaigns.id');

        return $queryBuilder;
    }

    /**
     * Add columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('admin::app.settings.marketing.campaigns.index.datagrid.id'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('admin::app.settings.marketing.campaigns.index.datagrid.name'),
            'type'       => 'string',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'    => 'subject',
            'label'    => trans('admin::app.settings.marketing.campaigns.index.datagrid.subject'),
            'type'     => 'string',
            'sortable' => true,
        ]);

        $this->addColumn([
            'index'    => 'type',
            'label'    => trans('admin::app.settings.marketing.campaigns.index.datagrid.type'),
            'type'     => 'string',
            'sortable' => true,
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        // TODO: Implement the bouncer for this actions.
        $this->addAction([
            'index'  => 'edit',
            'icon'   => 'icon-edit',
            'title'  => trans('admin::app.settings.marketing.campaigns.index.datagrid.edit'),
            'method' => 'GET',
            'url'    => fn ($row) => route('admin.settings.marketing_events.edit', $row->id),
        ]);

        $this->addAction([
            'index'          => 'delete',
            'icon'           => 'icon-delete',
            'title'          => trans('admin::app.settings.marketing.campaigns.index.datagrid.delete'),
            'method'         => 'DELETE',
            'url'            => fn ($row) => route('admin.settings.marketing_events.delete', $row->id),
        ]);
    }

    /**
     * Prepare mass actions.
     */
    public function prepareMassActions(): void
    {
        $this->addMassAction([
            'icon'   => 'icon-delete',
            'title'  => trans('admin::app.settings.marketing.campaigns.index.datagrid.delete'),
            'method' => 'POST',
            'url'    => route('admin.settings.marketing_events.mass_delete'),
        ]);
    }
}
