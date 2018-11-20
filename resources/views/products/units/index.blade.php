@extends('layouts.app')

@section('page-title', trans('app.products-units-title'))
@section('page-heading', trans('app.products-units-title'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.products-units-title')
    </li>
@stop

@section('content')

@include('partials.messages')

    <div class="card">
	    <div class="card-body">
	    	<form action="" method="GET" id="unit-form" class="pb-2 mb-3 border-bottom-light">
	    		@csrf
	            <div class="row my-3 flex-md-row flex-column-reverse">
	                <div class="col-md-4 mt-md-0 mt-2">
	                    <div class="input-group custom-search-form">
	                        <input type="text"
	                               class="form-control input-solid"
	                               name="search"
	                               value="{{ Input::get('search') }}"
	                               placeholder="@lang('app.products_search_for_units')">

	                            <span class="input-group-append">
	                                @if (Input::has('search') && Input::get('search') != '')
	                                    <a href="{{ route('unit.index') }}"
	                                           class="btn btn-light d-flex align-items-center text-muted"
	                                           role="button">
	                                        <i class="fas fa-times"></i>
	                                    </a>
	                                @endif
	                                <button class="btn btn-light" type="submit" id="search-units-btn">
	                                    <i class="fas fa-search text-muted"></i>
	                                </button>
	                            </span>
	                    </div>
	                </div>

	                <div class="col-md-2 mt-2 mt-md-0">
	                    {{-- {!! Form::select('status', $statuses, Input::get('status'), ['id' => 'status', 'class' => 'form-control input-solid']) !!} --}}
	                </div>

	                <div class="col-md-6">
	                    <a href="{{ route('unit.create') }}" class="btn btn-primary btn-rounded float-right">
	                        <i class="fas fa-plus mr-2"></i>
	                        @lang('app.products_add_unit')
	                    </a>
	                </div>
	            </div>
	        </form>
	        
	        <div class="table-responsive">
	            <table class="table table-borderless table-striped">
	                <thead>
	                    <th class="">@lang('app.product-unit-clave')</th>
	                    <th class="min-width-150">@lang('app.product-unit-name')</th>
	                    <th class="min-width-300">@lang('app.product-unit-description')</th>
	                    <th class="min-width-300">@lang('app.product-unit-notes')</th>
	                    <th class="min-width-150">@lang('app.action')</th>
	                </thead>
	                <tbody>
	                    @foreach ($units as $unit)
	                        <tr>
	                            <td>{{ $unit->clave }}</td>
	                            <td style="min-width: 100px">{{ $unit->name }}</td>
	                            <td style="min-width: 300px">{{ $unit->description }}</td>
	                            <td style="min-width: 300px">{{ $unit->notes }}</td>
	                            <td class="align-left">
							        {{-- <div class="dropdown show d-inline-block">
							            <a class="btn btn-icon"
							               href="#" role="button" id="dropdownMenuLink"
							               data-toggle="dropdown"
							               aria-haspopup="true" aria-expanded="false">
							                <i class="fas fa-ellipsis-h"></i>
							            </a>

							            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
							                @if (config('session.driver') == 'database')
							                    <a href="{{ route('user.sessions', $user->id) }}" class="dropdown-item text-gray-500">
							                        <i class="fas fa-list mr-2"></i>
							                        @lang('app.user_sessions')
							                    </a>
							                @endif
							                <a href="{{ route('user.show', $user->id) }}" class="dropdown-item text-gray-500">
							                    <i class="fas fa-eye mr-2"></i>
							                    @lang('app.view_user')
							                </a>
							                @canBeImpersonated($user)
							                    <a href="{{ route('impersonate', $user->id) }}" class="dropdown-item text-gray-500 impersonate">
							                        <i class="fas fa-user-secret mr-2"></i>
							                        @lang('app.impersonate')
							                    </a>
							                @endCanBeImpersonated
							            </div>
							        </div> --}}

							        <a href="{{ route('unit.edit', $unit->id) }}"
							           class="btn btn-icon edit"
							           title="@lang('app.products_edit_unit')"
							           data-toggle="tooltip" data-placement="top">
							            <i class="fas fa-edit"></i>
							        </a>

							        <a href="{{ route('unit.delete', $unit->id) }}"
							           class="btn btn-icon"
							           title="@lang('app.product_unit_delete_user')"
							           data-toggle="tooltip"
							           data-placement="top"
							           data-method="DELETE"
							           data-confirm-title="@lang('app.product_unit_please_confirm')"
							           data-confirm-text="@lang('app.product_unit_are_you_sure_delete')"
							           data-confirm-delete="@lang('app.product_unit_yes_delete')">
							            <i class="fas fa-trash"></i>
							        </a>
							    </td>

	                            {{-- <td>{{ $unit->created_at->format(config('app.date_time_format')) }}</td> --}}
	                            {{-- <td class="text-center">
	                                <a tabindex="0" role="button" class="btn btn-icon"
	                                   data-trigger="focus"
	                                   data-placement="left"
	                                   data-toggle="popover"
	                                   title="@lang('app.user_agent')"
	                                   data-content="{{ $activity->user_agent }}">
	                                    <i class="fas fa-info-circle"></i>
	                                </a>
	                            </td> --}}
	                        </tr>
	                    @endforeach
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>

{!! $units->render() !!}

@stop