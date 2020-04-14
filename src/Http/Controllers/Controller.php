<?php

namespace Anggagewor\Purdia\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Controller extends \Illuminate\Routing\Controller
{
    public $modelName;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function rules()
    {
        $modelName      = $this->modelName;
        $columns        = (new $modelName)->getTableColumns();
        $rules = [];
        foreach ($columns as $column) {
            $rules[$column['name']] = ($column['notnull']) ? 'required' : '';
        }
        return $rules;
    }

    public function index(Request $request)
    {
        $modelName      = $this->modelName;
        $models         = new $this->modelName;
        $driver         = $models->getConnection()->getConfig()['driver'];
        $whereGrammer   = ($driver == 'pgsql') ? 'ilike' : 'like';
        $columns        = (new $modelName)->getTableColumns();
        foreach ($columns as $column) {
            if ($column['type'] === 'integer' || $column['type'] === 'boolean' || $column['type'] === 'smallint' || $column['type'] === 'bigint') {
                if (!is_null($request->{$column['name']})) {
                    $models = $models->where($column['name'], trim($request->{$column['name']}));
                }
            }
            if ($column['type'] === 'string') {
                if (!is_null($request->{$column['name']})) {
                    $models = $models->where($column['name'], $whereGrammer, '%'.$request->{$column['name']}.'%');
                }
            }
        }
        if ($request->has('with')) {
            $models = $models->with(explode(',', $request->with));
        }
        $models = $models->paginate();
        return view('purdia::columns.index', compact('models', 'columns', 'modelName'));
    }


    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request, $id)
    {
        $modelName  = $this->modelName;
        $columns    = (new $modelName)->getTableColumns();
        $primary    = [];
        foreach ($columns as $column) {
            if ($column['autoincrement']) {
                $primary = $column;
            }
        }
        $model      = $modelName::where($primary['name'], $id)->first();
        return view('purdia::columns.edit', compact('model', 'columns', 'modelName', 'primary'));
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), $this->rules());
        if ($validation->fails()) {
            return back()->withErrors($validation->errors());
        }
        $modelName  = $this->modelName;
        $columns    = (new $modelName)->getTableColumns();
        $primary    = [];
        foreach ($columns as $column) {
            if ($column['autoincrement']) {
                $primary = $column;
            }
        }
        $model              = $modelName::where($primary['name'], $request->{$primary['name']})->firstOrFail();
        foreach ($model->getAttributes() as $attribute => $value) {
            $model->{$attribute} = $request->{$attribute};
        }
        $model->save();
        return back();
    }


    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request)
    {
        $modelName  = $this->modelName;
        $model      = new $modelName;
        $columns    = (new $modelName)->getTableColumns();
        return view('purdia::columns.create', compact('model', 'columns', 'modelName'));
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), $this->rules());
        if ($validation->fails()) {
            return back()->withErrors($validation->errors());
        }
        $modelName  = $this->modelName;
        $model      = new $modelName;
        $columns    = (new $modelName)->getTableColumns();
        foreach ($columns as $column) {
            if ($request->{$column['name']}) {
                $model->{$column['name']} = trim($request->{$column['name']});
            }
        }
        $model->save();
        return back();
    }

    public function destroy(Request $request, $column, $id)
    {
        $modelName  = $this->nameSpace.'\\'.Str::studly(Str::singular($column));
        $model      = $modelName::find($id);
        $model->delete();
        return back();
    }
}
