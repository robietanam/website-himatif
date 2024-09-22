<?php

namespace App\Repositories;

use App\Models\Division;
use Yajra\DataTables\DataTables;
use App\Models\PemiluCandidate;

class PemiluCandidateRepository
{
    /**
     * Get datatable for ajax
     *
     * @return mixed
     */
    public function getDatatable()
    {
        $users = PemiluCandidate::all();
        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                return '<div class="d-flex align-items-center">
                            <a href="' . route('dashboard.admin.pemilu-candidate.edit', $user->id) . '" class="btn btn-sm btn-warning">
                                <i class="fas fa-pen"></i>
                            </a>
                        </div>';
            })
            ->addColumn('photo', function ($user) {
                if ($user->photo) {
                    return '<div class="img-wrapper img-wrapper-table"><img src=' . asset('storage/' . $user->photo) . ' alt=""></div>';
                } else {
                    return '<div class="img-wrapper img-wrapper-table"><i class="fas fa-image text-white"></i></div>';
                }
            })
            ->addColumn('no', function ($user) {
                return $user->id;
            })
            ->addColumn('nama', function ($user) {
                return $user->nama;
            })
            ->addColumn('nim', function ($user) {
                return $user->nim;
            })
            ->addColumn('visi', function ($user) {
                return $user->visi;
            }) 
            ->addColumn('misi', function ($user) {
                return '<ul>' . implode('', array_map(function($item) {
                    return '<li>' . htmlspecialchars($item) . '</li>';
                }, $user->misi)) . '</ul>';
            })
            ->rawColumns(['action', 'photo', 'misi',])
            ->make(true);
    }

    public function get()
    {
        return PemiluCandidate::all();
    }
    

    public function count(array $condition = [])
    {
        return PemiluCandidate::when(count($condition) > 0, function ($q) use ($condition) {
            $q->where($condition);
        })->count();
    }

    /**
     * Get User by id
     *
     * @param int $id
     * @return PemiluCandidate
     */
    public function findById($id)
    {
        return PemiluCandidate::find($id);
    }

    /**
     * @param PemiluCandidate $data
     * @return PemiluCandidate
     */
    public function save($data)
    {
        try {
            $user = new PemiluCandidate;
            $user->nama = $data['nama'];
            $user->nim = $data['nim'];
            $user->visi = $data['visi'];
            $user->misi = $data['misi'];
            $user->created_at = now();

            // check if has photo request
            if (isset($data['photo'])) {
                $user->photo = $data['photo']->store('photo/candidate', 'public');
            }

            $user->save();
            return $user->fresh();
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }

    /**
     * @param int $id
     * @param PemiluCandidate $data
     * @return PemiluCandidate
     */
    public function update($id, $data)
    {
        try {
            
            $user = PemiluCandidate::find($id);
            $user->id = $data['id'];
            $user->nama = $data['nama'];
            $user->nim = $data['nim'];
            $user->visi = $data['visi'];
            $user->misi = $data['misi'];
            $user->updated_at = now();

            // check if has photo request
            if (isset($data['photo'])) {
                if ($user->photo && file_exists(storage_path('app/public/' . $user->photo))) {
                    \Storage::delete('public/' . $user->photo);
                }
                $user->photo = $data['photo']->store('photo/candidate', 'public');
            }

            $user->save();
            return $user->fresh();
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }

    public function destroys(array $ids)
    {
        $query = "id = $ids[0]";
        if (count($ids) > 1) {
            foreach ($ids as $i => $id) {
                // skip index 0, already appened on '$query'
                if ($i !== 0) $query .= " or id = $id";
            }
        }

        $result = \DB::table('pemilu_candidates')->whereRaw($query)->delete();

        return $result;
    }

}
