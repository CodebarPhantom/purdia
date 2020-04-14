<?php
namespace Anggagewor\Purdia;

use Illuminate\Support\Str;

class Model extends \Illuminate\Database\Eloquent\Model
{

    //
    protected $table;
    public $timestamps='false';
    protected $connection;
    public function searchable()
    {
        return [];
    }
    public function showable()
    {
        return [];
    }
    public function getTableColumns()
    {
        $details = $this->getConnection()->getDoctrineSchemaManager()->listTableColumns($this->getTable());
        $columns = [];
        foreach ($details as $detail) {
            $columns[] = [
                'type'                  => $detail->getType()->getName(),
                'length'                => $detail->getLength(),
                'precision'             => $detail->getPrecision(),
                'scale'                 => $detail->getScale(),
                'unsigned'              => $detail->getUnsigned(),
                'fixed'                 => $detail->getFixed(),
                'notnull'               => $detail->getNotnull(),
                'default'               => $detail->getDefault(),
                'autoincrement'         => $detail->getAutoincrement(),
                'platformOptions'       => $detail->getPlatformoptions(),
                'columnDefinition'      => $detail->getColumndefinition(),
                'comment'               => $detail->getComment(),
                'customSchemaOptions'   => $detail->getCustomschemaoptions(),
                'name'                  => $detail->getName(),
                'label'                 => Str::title(Str::of($detail->getName())->replace('_', ' '))
            ];
        }
        return collect($columns);
    }

    public function listTableNames()
    {
        $tables =  $this->getConnection()->getDoctrineSchemaManager()->listTableNames();
        return collect($tables);
    }

    public function listTableDetails($table)
    {
        $dbColumns =  $this->getConnection()->getDoctrineSchemaManager()->listTableDetails($table);
        $columns = [];
        foreach ($dbColumns as $dbColumn) {
            $columns[] = ['column' => $dbColumn];
        }
        return collect($columns);
    }
    protected static function keyName()
    {
        return (new static)->getKeyName();
    }

    protected static function tableName()
    {
        return (new static)->getTable();
    }
}
