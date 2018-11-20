<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Unit;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Unit\UnitRepository;
use Vanguard\Repositories\Unit\EloquentUnit;
use Illuminate\Support\Facades\Input;
use Vanguard\Http\Requests\Products\CreateProductUnit;

class UnitController extends Controller
{
    private $units;

    public function __construct(UnitRepository $units)
    {
        $this->middleware('auth');
        $this->middleware('permission:products.units');
        $this->units = $units;
    }

    public function index(Request $request)
    {     
        $units = $this->units->paginate(
            $perPage = 20,
            Input::get('search')
        );

        return view('products.units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductUnit $request)
    {
        $data = $request->all();
        $user = $this->units->create($data);

        return redirect()->route('unit.index')
            ->withSuccess(trans('app.product_unit_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = true;
        $unit = Unit::find($id);
        return view('products.units.edit', compact('edit', 'unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->units->delete($id);
        return redirect()->route('unit.index')
            ->withSuccess(trans('app.product_unit_deleted'));
    }
}
