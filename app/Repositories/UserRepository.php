<?php

namespace App\Repositories;

use Yajra\DataTables\DataTables;
use App\Models\User;

class UserRepository
{
    /**
     * Get datatable for ajax
     *
     * @return mixed
     */
    public function getDatatable()
    {
        $users = User::all();
        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                return '<div class="d-flex align-items-center">
                            <a href="' . route('dashboard.admin.users.edit', $user->id) . '" class="btn btn-sm btn-warning">
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
            ->addColumn('name', function ($user) {
                return $user->name;
            })
            ->addColumn('nim', function ($user) {
                return $user->nim;
            })
            ->addColumn('linkedin', function ($user) {
                return $user->linkedin;
            })
            ->addColumn('instagram', function ($user) {
                return $user->instagram;
            })
            ->addColumn('position', function ($user) {
                return $user->position;
            })
            ->addColumn('division', function ($user) {
                return $user->division->name;
            })
            ->addColumn('status', function ($user) {
                return $user->status === '1' ?
                    '<span class="badge badge-success">Aktif</span>' :
                    '<span class="badge badge-secondary">Tidak Aktif</span>';
            })
            ->addColumn('phone', function ($user) {
                return $user->phone;
            })
            ->addColumn('email', function ($user) {
                return $user->email;
            })
            ->addColumn('year_entry', function ($user) {
                return $user->year_entry;
            })
            ->addColumn('role', function ($user) {
                return $user->role->name;
            })
            ->rawColumns(['action', 'photo', 'status', 'is_featured'])
            ->make(true);
    }

    public function get()
    {
        return User::all();
    }

    public function count(array $condition = [])
    {
        return User::when(count($condition) > 0, function ($q) use ($condition) {
            $q->where($condition);
        })->count();
    }

    /**
     * Get User by id
     *
     * @param int $id
     * @return User
     */
    public function findById($id)
    {
        return User::find($id);
    }

    /**
     * @param User $data
     * @return User
     */
    public function save($data)
    {
        try {
            $user = new User;
            $user->name = $data['name'];
            $user->nim = $data['nim'];
            $user->linkedin = $data['linkedin'];
            $user->instagram = $data['instagram'];
            $user->position = $data['position'];
            $user->division_id = $data['division_id'];
            $user->status = $data['status'] ?? '1';
            $user->phone = $data['phone'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->year_entry = $data['year_entry'];
            $user->role_id = '2';
            $user->created_at = now();

            // check if has photo request
            if (isset($data['photo'])) {
                $user->photo = $data['photo']->store('photo/user', 'public');
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
     * @param User $data
     * @return User
     */
    public function update($id, $data)
    {
        try {
            $user = User::find($id);
            $user->name = $data['name'] ?? $user->name;
            $user->nim = $data['nim'] ?? $user->nim;
            $user->linkedin = $data['linkedin'] ?? $user->linkedin;
            $user->instagram = $data['instagram'] ?? $user->instagram;
            $user->position = $data['position'] ?? $user->position;
            $user->division_id = $data['division_id'] ?? $user->division_id;
            $user->status = $data['status'] ?? $user->status;
            $user->phone = $data['phone'] ?? $user->phone;
            $user->email = $data['email'] ?? $user->email;
            $user->year_entry = $data['year_entry'] ?? $user->year_entry;
            $user->updated_at = now();

            // check if has password update request
            if (isset($data['password'])) {
                $user->password = bcrypt($data['password']);
            }

            // check if has photo request
            if (isset($data['photo'])) {
                if ($user->photo && file_exists(storage_path('app/public/' . $user->photo))) {
                    \Storage::delete('public/' . $user->photo);
                }
                $user->photo = $data['photo']->store('photo/user', 'public');
            }

            $user->save();
            return $user->fresh();
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }

    /**
     * @param int $proker_id
     * @param array $ids
     * @param string $status = '0'|'1'
     */
    public function setStatus($ids, $status)
    {
        $query = "id = $ids[0]";
        if (count($ids) > 1) {
            foreach ($ids as $i => $id) {
                // skip index 0, already appened on '$query'
                if ($i !== 0) $query .= " or id = $id";
            }
        }

        $result = \DB::table('users')->whereRaw($query)->update(['status' => $status]);

        return $result;
    }
}
