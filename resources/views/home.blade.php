@extends('purdia::app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <x-purdia-card>
            <div class="card-header">Get Started</div>
            <div class="card-body">
                Welcome to {{ Purdia::name() }}! Get familiar with {{ Purdia::name() }} and explore its features in the
                documentation:
            </div>
        </x-purdia-card>
    </div>
</div>
@endsection
