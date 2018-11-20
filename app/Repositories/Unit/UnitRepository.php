<?php

namespace Vanguard\Repositories\Unit;

interface UnitRepository
{

    public function paginate($perPage, $search = null);

    public function delete($id);

    public function create(array $data);

    public function edit(array $data);

}