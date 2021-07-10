<?php

namespace App\Tables;

use App\Sentencias;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;

class SentenciasTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table())->model(Sentencias::class)
            ->routes([
                'index'   => ['name' => 'sentencia.index'],
                'edit'    => ['name' => 'sentencia.edit'],
                'show'    => ['name' => 'sentencia.show'],
                'destroy' => ['name' => 'sentencia.destroy']
            ])
            ->rowsNumber(5)
            ->activateRowsNumberDefinition(true)
            ->destroyConfirmationHtmlAttributes(fn($sentencia)=>['data-confirm' => __('¿ Estas seguro en eliminar la sentencia :NroExp ?', ['NroExp' => $sentencia->NroExp])])
        ;
    }

    /**
     * Configure the table columns.
     *
     * @param \Okipa\LaravelTable\Table $table
     *
     * @throws \ErrorException
     */
    protected function columns(Table $table): void
    {
        $table->column('NroExp')->title('Numero Expediente')->searchable();
        $table->column('dependencia_id')->title('Dependencia');
        $table->column('created_at')->dateTimeFormat('d/m/Y - H:i')->title('Fecha Generacion')->sortable(true,'desc');
    }

    /**
     * Configure the table result lines.
     *
     * @param \Okipa\LaravelTable\Table $table
     */
    protected function resultLines(Table $table): void
    {
        //
    }
}