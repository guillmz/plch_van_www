<?php

namespace Vanguard\Repositories\Unit;

use Carbon\Carbon;
use Vanguard\Unit;
use DB;

class EloquentUnit implements UnitRepository
{

    public function paginate($perPage = 20, $search = null)
    {

        $query = Unit::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('clave', "like", "%{$search}%");
                $q->orWhere('name', 'like', "%{$search}%");
                $q->orWhere('description', 'like', "%{$search}%");
                $q->orWhere('notes', 'like', "%{$search}%");
            });
        }

        $result = $query->orderBy('id', 'desc')
            ->paginate($perPage);

        if ($search) {
            $result->appends(['search' => $search]);
        }

        return $result;
    }

    public function find($id)
    {
        return Unit::find($id);
    }

    public function delete($id)
    {
        $unit = $this->find($id);
        return $unit->delete();
    }

    public function create(array $data)
    {
        return Unit::create($data);
    }

    public function edit(array $data)
    {
        return Unit::create($data);
    }
}