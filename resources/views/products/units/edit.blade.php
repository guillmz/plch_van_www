@extends('layouts.app')

@section('page-title', trans('app.products-units-title'))
@section('page-heading', trans('app.products-units-title'))

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('unit.index') }}">@lang('app.products-units-title')</a>
    </li>
    <li class="breadcrumb-item active">
        @lang('app.products_unit_create_new')
    </li>
@stop

@section('content')

@include('partials.messages')


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <h5 class="card-title">
                    @lang('app.products_units_details')
                </h5>
                <p class="text-muted font-weight-light">
                    A general products units information.
                </p>
            </div>
            <div class="col-md-9">

            	{!! Form::open(['route' => ['unit.update', $unit->id], 'method' => 'PUT', 'id' => 'unit_update-form']) !!}
                    @include('products.units.partials.add')
                {!! Form::close() !!}
 
            </div>
        </div>
    </div>
</div>

    {{-- <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        @lang('app.login_details')
                    </h5>
                    <p class="text-muted font-weight-light">
                        Details used for authenticating with the application.
                    </p>
                </div>
                <div class="col-md-9">
                    @include('user.partials.auth', ['edit' => false])
                </div>
            </div>
        </div>
    </div> --}}


<br>
@stop

@section('scripts')
    {!! HTML::script('assets/js/as/profile.js') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\Products\CreateProductUnit', '#unit-form') !!}
@stop