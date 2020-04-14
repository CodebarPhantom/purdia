@extends('purdia::app')

@section('content')
<div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title mb-3">
            {{ Str::title(str_replace('_', ' ', Str::singular( (new $modelName)->getTable() ))) }}
        </h2>
        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
          <li class="breadcrumb-item"><a href="{{ url(config('purdia.path')) }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url(config('purdia.path').'/'.(new $modelName)->getTable() ) }}">{{ Str::title(str_replace('_', ' ', Str::singular( (new $modelName)->getTable() ))) }}</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="#">Edit</a></li>
        </ol>
      </div>
      <!-- Page title actions -->
      <div class="col-auto ml-auto d-print-none">
      </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="" method="post">
            @csrf
            <x-purdia-card>
                <div class="card-header">Edit #{{ $model->{$columns->firstWhere('name',$primary['name'])['name']} }}</div>
                <div class="card-body">
                    <div class="row">
                    @foreach($model->getAttributes() as $attribute => $value)
                        @if(
                            $columns->firstWhere('name',$attribute)['type'] == 'string'
                            )
                            <div class="col-md-6">
                                <x-purdia-input type="text" :label="$columns->firstWhere('name',$attribute)['label']" :name="$attribute" :value="$value"></x-purdia-input>
                            </div>
                        @endif

                        @if($columns->firstWhere('name',$attribute)['type'] == 'date')
                        <div class="col-md-6">
                            <x-purdia-input-date-time :label="$columns->firstWhere('name',$attribute)['label']" :name="$attribute" :value="$value"></x-purdia-input-date-time>
                        </div>
                        @endif

                        @if($columns->firstWhere('name',$attribute)['type'] == 'datetime')
                        <div class="col-md-6">
                            <x-purdia-input-date-time :label="$columns->firstWhere('name',$attribute)['label']" :name="$attribute" :value="$value" :type="$columns->firstWhere('name',$attribute)['type']"></x-purdia-input-date-time>
                        </div>
                        @endif

                        @if($columns->firstWhere('name',$attribute)['type'] == 'time')
                        <div class="col-md-6">
                            <x-purdia-input-date-time :label="$columns->firstWhere('name',$attribute)['label']" :name="$attribute" :value="$value" type="datetime"></x-purdia-input-date-time>
                        </div>
                        @endif


                        @if(
                            $columns->firstWhere('name',$attribute)['type'] == 'float' ||
                            $columns->firstWhere('name',$attribute)['type'] == 'decimal' ||
                            $columns->firstWhere('name',$attribute)['type'] == 'integer' ||
                            $columns->firstWhere('name',$attribute)['type'] == 'smallint' ||
                            $columns->firstWhere('name',$attribute)['type'] == 'tinyint' ||
                            $columns->firstWhere('name',$attribute)['type'] == 'boolean' ||
                            $columns->firstWhere('name',$attribute)['type'] == 'bigint')
                            <div class="col-md-6">
                                <x-purdia-input type="number" :label="$columns->firstWhere('name',$attribute)['label']" :name="$attribute" :value="$value"></x-purdia-input>
                            </div>
                        @endif
                        @if($columns->firstWhere('name',$attribute)['type'] == 'text' || $columns->firstWhere('name',$attribute)['type'] == 'longtext'  || $columns->firstWhere('name',$attribute)['type'] == 'mediumtext')
                        <div class="col-md-12">
                            <x-purdia-input-textarea :label="$columns->firstWhere('name',$attribute)['label']" :name="$attribute" :value="$value"></x-purdia-input-textarea>
                        </div>
                        @endif
                    @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </x-purdia-card>
        </form>

    </div>
</div>
@endsection
