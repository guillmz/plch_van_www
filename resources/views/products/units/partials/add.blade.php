<div class="row">

    <div class="col-md-2">
        <div class="form-group">
            <label for="clave">@lang('app.products_units_form_clave')</label>
            <input type="text" class="form-control" id="clave"
                   name="clave" placeholder="" value="{{ $edit ? $unit->clave : '' }}">
        </div>
    </div>

    <div class="col-md-10">
        <div class="form-group">
            <label for="name">@lang('app.products_units_form_name')</label>
            <input type="text" class="form-control" id="name"
                   name="name" placeholder="" value="{{ $edit ? $unit->name : '' }}">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="description">@lang('app.products_units_form_desc')</label>
            <textarea rows="4" class="form-control" id="description"
                   name="description" placeholder="" value="">{{ $edit ? $unit->description : '' }}
            </textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="notes">@lang('app.products_units_form_notes')</label>
            <textarea rows="4" class="form-control" id="notes"
                   name="notes" placeholder="" value="">{{ $edit ? $unit->notes : '' }}
                   {{-- @lang('app.products_units_form_notes') --}}
            </textarea>
        </div>
    </div>

    @if ($edit)
        <div class="col-md-12 mt-2">
            <button type="submit" class="btn btn-primary" id="update-details-btn">
                <i class="fa fa-refresh"></i>
                @lang('app.update_details')
            </button>
        </div>
    @endif
    
</div>
