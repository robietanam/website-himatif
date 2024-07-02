<?php

namespace App\Repositories;

use Yajra\DataTables\DataTables;
use App\Models\ProkerUser;

class ProkerUserRepository
{
    /**
     * @param int $proker_id
     */
    public function getDatatable($proker_id)
    {
        $users = ProkerUser::where('proker_id', $proker_id)->orderBy('proker_division_id')->get();
        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                return '<div class="d-flex align-items-center">
                            <button
                                type="button"
                                onclick="handleShowModalEdit(this)"
                                class="btn btn-sm btn-warning mr-1"
                                data-m-edit-proker-user-id="' . $user->id . '"
                                data-m-edit-proker-user-name="' . $user->name . '"
                                data-m-edit-proker-user-nim="' . $user->nim . '"
                                data-m-edit-proker-user-phone="' . $user->phone . '"
                                data-m-edit-proker-user-proker_division_id="' . $user->proker_division_id . '"
                                data-m-edit-proker-user-note="' . $user->note . '"
                                data-m-edit-proker-user-user_id="' . $user->user_id . '"
                            >
                                <i class="fas fa-pen"></i>
                            </button>
                            <form
                                class="form-delete"
                                action="' . route("dashboard.admin.prokers.destroy.user", $user->id) . '"
                                onsubmit="handleDeleteProkerUser(event)"
                                method="POST"
                            >
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <input type="hidden" name="_method" value="DELETE">
                                <button
                                    type="submit"
                                    class="btn btn-sm btn-danger"
                                    data-bs-toggle="tooltip" data-placement="top" title="Sek Tidak Aktif Proker"
                                >
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>';
            })
            ->addColumn('name', function ($user) {
                return $user->name;
            })
            ->addColumn('nim', function ($user) {
                return $user->nim;
            })
            ->addColumn('phone', function ($user) {
                return $user->phone;
            })
            ->addColumn('position', function ($user) {
                return $user->prokerDivision->name;
            })
            ->addColumn('note', function ($user) {
                return $user->note;
            })
            ->addColumn('created_at', function ($proker) {
                return \Carbon\Carbon::parse($proker->created_at)->translatedFormat('d F Y');
            })
            ->addColumn('updated_at', function ($proker) {
                return \Carbon\Carbon::parse($proker->updated_at)->translatedFormat('d F Y');
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getDatatablePengurus($proker_id)
    {
        $users = ProkerUser::where('proker_id', $proker_id)->orderBy('proker_division_id')->get();
        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                if ($user->proker_division_id === '1') {
                    return '<div class="d-flex align-items-center">
                                <button
                                    type="button"
                                    disabled
                                    class="btn btn-sm btn-warning mr-1"
                                >
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button
                                    type="button"
                                    disabled
                                    class="btn btn-sm btn-danger"
                                >
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>';
                } else {
                    return '<div class="d-flex align-items-center">
                                <button
                                    type="button"
                                    onclick="handleShowModalEdit(this)"
                                    class="btn btn-sm btn-warning mr-1"
                                    data-m-edit-proker-user-id="' . $user->id . '"
                                    data-m-edit-proker-user-name="' . $user->name . '"
                                    data-m-edit-proker-user-nim="' . $user->nim . '"
                                    data-m-edit-proker-user-phone="' . $user->phone . '"
                                    data-m-edit-proker-user-proker_division_id="' . $user->proker_division_id . '"
                                    data-m-edit-proker-user-note="' . $user->note . '"
                                    data-m-edit-proker-user-user_id="' . $user->user_id . '"
                                >
                                    <i class="fas fa-pen"></i>
                                </button>
                                <form
                                    class="form-delete"
                                    action="' . route("dashboard.admin.prokers.destroy.user", $user->id) . '"
                                    onsubmit="handleDeleteProkerUser(event)"
                                    method="POST"
                                >
                                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        data-bs-toggle="tooltip" data-placement="top" title="Sek Tidak Aktif Proker"
                                    >
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>';
                }
            })
            ->addColumn('name', function ($user) {
                return $user->name;
            })
            ->addColumn('nim', function ($user) {
                return $user->nim;
            })
            ->addColumn('phone', function ($user) {
                return $user->phone;
            })
            ->addColumn('position', function ($user) {
                return $user->prokerDivision->name;
            })
            ->addColumn('note', function ($user) {
                return $user->note;
            })
            ->addColumn('created_at', function ($proker) {
                return \Carbon\Carbon::parse($proker->created_at)->translatedFormat('d F Y');
            })
            ->addColumn('updated_at', function ($proker) {
                return \Carbon\Carbon::parse($proker->updated_at)->translatedFormat('d F Y');
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function save($data)
    {
        try {
            $prokerUser = new ProkerUser;
            $prokerUser->name = $data['name'];
            $prokerUser->nim = $data['nim'];
            $prokerUser->phone = $data['phone'];
            $prokerUser->proker_division_id = $data['proker_division_id'];
            $prokerUser->note = $data['note'];
            $prokerUser->created_at = now();
            $prokerUser->user_id = $data['user_id'] ?? null;
            $prokerUser->proker_id = $data['proker_id'];

            $prokerUser->save();

            return $prokerUser->fresh();
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }

    /**
     * @param int $id
     * @param int $proker_id
     * @param ProkerUser $data
     */
    public function update($id, $data)
    {
        try {
            $prokerUser = ProkerUser::find($id);
            $prokerUser->name = $data['name'];
            $prokerUser->nim = $data['nim'];
            $prokerUser->phone = $data['phone'];
            $prokerUser->note = $data['note'];
            $prokerUser->proker_division_id = $data['proker_division_id'];
            $prokerUser->user_id = $data['user_id'] ?? null;
            $prokerUser->updated_at = now();

            $prokerUser->save();

            return $prokerUser;
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }

    public function delete($id)
    {
        try {
            return ProkerUser::destroy($id);
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }
}
