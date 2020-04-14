@php
$showable = (new $modelName)->showable();
@endphp
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
          <li class="breadcrumb-item active" aria-current="page"><a href="#">Data</a></li>
        </ol>
      </div>
      <!-- Page title actions -->
      <div class="col-auto ml-auto d-print-none">
      </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card" data-color="green">
            <div class="card-body">
              <div class="float-right stamp bg-yellow text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                  <path d="M5.5 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path>
                </svg>
              </div>
              <div class="text-muted font-weight-normal mt-0">Total Data</div>
              <h3 class="h2 mt-2 mb-3" data-countup>{{ $modelName::orderBy('id','ASC')->count() }}</h3>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="row justify-content-end">
            <div class="col-md-3">
                <a href="{{ url(config('purdia.path').'/'.(new $modelName)->getTable() .'/create' ) }}" class="btn btn-info float-right">Create</a>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <x-purdia-card>
            <div class="table-responsive">
            <form action="" method="get">
                <x-purdia-table class="table card-table table-vcenter">
                    <thead>
                        <x-purdia-table-row>
                            @foreach($columns as $column)
                                @if( in_array($column['name'], $showable))
                                <th>
                                    {{ $column['label'] }}
                                </th>
                                @endif
                            @endforeach
                            <th>
                                <i class="ti ti-settings"></i>
                            </th>
                        </x-purdia-table-row>
                    </thead>
                    <tbody>
                            @foreach($models->sort() as $model)
                                @if ($loop->first)
                                    @if(count((new $modelName)->searchable()) > 0)
                                        <x-purdia-table-row>
                                            @foreach($columns as $column)
                                                <x-purdia-table-data>
                                                    <input type="text" class="form-control" name="{{ $column['name'] }}" placeholder="Search {{ $column['name'] }}" value="{{ request($column['name']) }}">
                                                </x-purdia-table-data>
                                            @endforeach
                                            <x-purdia-table-data>
                                                <button type="submit" class="btn btn-sm btn-info btn-block ">
                                                    <i class="ti ti-filter"></i>
                                                    submit
                                                </button>
                                                <a href="{{ config('purdia.path') }}/{{ (new $modelName)->getTable() }}" class="btn btn-block btn-sm btn-warning">
                                                    <i class="ti ti-refresh-cw"></i>
                                                    reset
                                                </a>
                                            </x-purdia-table-data>
                                        </x-purdia-table-row>
                                    @endif
                                @endif
                            @endforeach
                            @foreach($models->sort() as $model)
                                <x-purdia-table-row>
                                    @foreach($columns as $column)
                                        @if( in_array($column['name'], $showable))
                                            <x-purdia-table-data>
                                                @if($column['type'] == 'smallint' && $model->{$column['name']} == '1')
                                                <i class="ti ti-check text-success"></i>
                                                @elseif($column['type'] == 'smallint' && $model->{$column['name']} == '0' || $column['type'] == 'smallint' && is_null($model->{$column['name']}))
                                                <i class="ti ti-x text-danger"></i>
                                                @else
                                                {{ $model->{$column['name']} }}
                                                @endif
                                            </x-purdia-table-data>
                                        @endif
                                    @endforeach
                                    @foreach($columns as $column)
                                    @if($column['autoincrement'])
                                    <x-purdia-table-data class="text-center">
                                        <div class="item-action dropdown">
                                          <a href="#" data-toggle="dropdown" data-boundary="window" class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"/>
                                                <circle cx="12" cy="12" r="1" />
                                                <circle cx="12" cy="19" r="1" />
                                                <circle cx="12" cy="5" r="1" />
                                            </svg>
                                        </a>
                                          <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ config('purdia.path') }}/{{ (new $modelName)->getTable() }}/resources/{{ $model->{$column['name']} }}/edit" class="dropdown-item">
                                                <i class="dropdown-icon ti ti-eye mr-3"></i>
                                                View / Edit
                                            </a>
                                            <a href="{{ config('purdia.path') }}/{{ (new $modelName)->getTable() }}/resources/{{ $model->{$column['name']} }}/delete" class="dropdown-item text-danger">
                                                <i class="dropdown-icon ti ti-x mr-3"></i>
                                                Delete
                                            </a>
                                          </div>
                                        </div>
                                    </x-purdia-table-data>
                                    @endif
                                    @endforeach
                                </x-purdia-table-row>
                            @endforeach
                    </tbody>
                </x-purdia-table>
            </form>
            </div>
        </x-purdia-card>
        {{ $models->appends(request()->query())->links() }}
    </div>
</div>
@endsection
