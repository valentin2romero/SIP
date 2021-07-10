<?php

namespace App\Tables;

use App\Textosentencias;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;

class TextosentenciasTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table())->model(Textosentencias::class)
            ->routes([
                'index'   => ['name' => 'texto-sentencia.index'],
                'create'  => ['name' => 'texto-sentencia.create'],
                'edit'    => ['name' => 'texto-sentencia.edit'],
                'show'    => ['name' => 'texto-sentencia.show'],
                'destroy' => ['name' => 'texto-sentencia.destroy'],
            ])
            ->rowsNumber(5)
            ->activateRowsNumberDefinition(true)
            ->destroyConfirmationHtmlAttributes(fn ($textoSentencia) => ['data-confirm' => __('¿ Estas seguro en eliminar el texto sentencia de la variable: :variable , que tiene la opcion: :opcion ?', ['variable' => $textoSentencia->variable, 'opcion' => $textoSentencia->opcion])]);
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
        $table->column('id')->title('Numero de ID');
        $table->column('variable')->title('Variable Representada')->searchable();
        $table->column('fecha_inicio')->dateTimeFormat('d/m/Y')->title('Fecha Inicio')->sortable(true, 'desc');
        $table->column('fecha_final')->dateTimeFormat('d/m/Y')->title('Fecha Finalizacion');
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
