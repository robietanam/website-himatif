<?php

namespace App\Repositories;

use App\Models\Division;

class DivisionRepository
{
    public function get()
    {
        return Division::all();
    }

    public function getParent()
    {
        return Division::whereNull('parent_id')->get();
    }

    public function count(array $condition = [])
    {
        return Division::when(count($condition) > 0, function ($q) use ($condition) {
            $q->where($condition);
        })->count();
    }

    /**
     * Get Division by id
     *
     * @param int $id
     * @return Division
     */
    public function findById($id)
    {
        return Division::find($id);
    }

    /**
     * @param Division $data
     * @return Division
     */
    public function save($data)
    {
        try {
            $division = new Division;
            $division->name = $data['name'];
            $division->name_slug = $data['name_slug'];
            $division->description = $data['description'];
            $division->status = $data['status'] ?? '1';
            $division->parent_id = $data['parent_id'] ?? null;
            $division->created_at = now();

            $division->save();
            return $division->fresh();
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }

    /**
     * @param int $id
     * @param Division $data
     * @return Division
     */
    public function update($id, $data)
    {
        try {
            $division = Division::find($id);
            $division->name = $data['name'];
            $division->name_slug = $data['name_slug'];
            $division->description = $data['description'];
            $division->status = $data['status'];
            $division->parent_id = $data['parent_id'] ?? null;
            $division->updated_at = now();

            $division->save();
            return $division;
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }
}
