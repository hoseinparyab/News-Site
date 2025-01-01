<?php

namespace PYB\Advertising\Repositories;

use PYB\Advertising\Models\Advertising;

class AdvertisingRepo
{
    public function index()
    {
        // Your implementation here
        return $this->query()->latest();

    }

    public function findById($id)
    {
        // Your implementation here
        return $this->query()->findOrFail($id);
    }

    public function delete($id)
    {
        // Your implementation here
        return $this->query()->where('id', $id)->delete();
    }
    public function query()
    {
        return Advertising::query();

    }
}
