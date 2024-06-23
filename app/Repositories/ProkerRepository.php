<?php

namespace App\Repositories;

use Yajra\DataTables\DataTables;
use App\Models\Proker;
use App\Models\ProkerUser;


class ProkerRepository
{
    public function get(int $limit = null, array $condition = [], array $orCondition = [])
    {
        return Proker::orderBy('is_registration_open', 'desc')
            ->orderBy('is_timeline_open', 'desc')
            ->orderBy('updated_at', 'desc')
            ->when(count($condition) > 0, function ($q) use ($condition) {
                $q->where($condition);
            })
            ->when(count($orCondition) > 0, function ($q) use ($orCondition) {
                $q->orWhere($orCondition);
            })
            ->when(!is_null($limit), function ($q) use ($limit) {
                $q->limit($limit);
            })->get();
    }

    public function getDatatable($status = null)
    {
        $prokers = null;
        if (!is_null($status)) {
            dd($status);
            $prokers = Proker::where('status', '=', $status)->get();
        } else {
            $prokers = Proker::all();
        }
        return DataTables::of($prokers)
            ->addColumn('action', function ($proker) {
                return '<div class="d-flex align-items-center">
                            <a href="' . route('dashboard.admin.prokers.show', $proker->id) . '" class="btn btn-sm btn-primary mr-1">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="' . route('dashboard.admin.prokers.edit', $proker->id) . '" class="btn btn-sm btn-warning">
                                <i class="fas fa-pen"></i>
                            </a>
                        </div>';
            })
            ->addColumn('logo', function ($proker) {
                if ($proker->logo) {
                    return '<div class="img-wrapper img-wrapper-table"><img src=' . asset('storage/' . $proker->logo) . ' alt=""></div>';
                } else {
                    return '<div class="img-wrapper img-wrapper-table"><i class="fas fa-image text-white"></i></div>';
                }
            })
            ->addColumn('name', function ($proker) {
                return $proker->name;
            })
            ->addColumn('status', function ($proker) {
                return $proker->status === '1' ?
                    '<span class="badge badge-success"><i class="fas fa-check-square mr-1"></i> Aktif</span>' :
                    '<span class="badge badge-secondary"><i class="fas fa-minus-square mr-1"></i> Tidak Aktif</span>';
            })
            ->addColumn('is_registration_open', function ($proker) {
                return $proker->is_registration_open === '1' ?
                    '<span class="badge badge-primary"><i class="fas fa-share-square mr-1"></i> Dibuka</span>' :
                    '<span class="badge badge-secondary"><i class="fas fa-minus-square mr-1"></i> Ditutup</span>';
            })
            ->addColumn('leader', function ($proker) {
                return $proker->prokerUsers()->where('proker_division_id', 1)->first()->name ?? '-';
            })
            ->addColumn('link_registration', function ($proker) {
                return  "<a target='_blank' href=" . $proker->link_registration . ">" . substr($proker->link_registration, 0, 40) . "</a>";
            })
            ->addColumn('description', function ($proker) {
                return substr(strip_tags($proker->description), 0, 40) . ((strlen(strip_tags($proker->description)) > 40) ? '...' : '');
            })
            ->addColumn('created_at', function ($proker) {
                return \Carbon\Carbon::parse($proker->created_at)->translatedFormat('d F Y');
            })
            ->addColumn('updated_at', function ($proker) {
                return \Carbon\Carbon::parse($proker->updated_at)->translatedFormat('d F Y');
            })
            ->rawColumns([
                'action',
                'logo',
                'slug',
                'status',
                'is_registration_open',
                'link_registration'
            ])
            ->make(true);
    }

    public function getByAuthId()
    {
        return Proker::whereHas('prokerUsers', function ($q) {
            return $q->where('user_id', \Auth::user()->id)->where('proker_division_id', '1');
        })->get();
    }

    public function count(array $condition = [])
    {
        return Proker::when(count($condition) > 0, function ($q) use ($condition) {
            $q->where($condition);
        })->count();
    }

    public function findById($id)
    {
        return Proker::find($id);
    }

    public function save($data)
    {
        try {
            
            $proker = new Proker;
            $proker->name = $data['name'];
            $proker->description = $data['description'];
            $proker->is_registration_open = '0';
            $proker->status = '0';
            

            // check if has photo request
            if (isset($data['logo'])) {
                $proker->logo = $data['logo']->store('photo/proker', 'public');
            }

            $proker->save();
            return $proker->fresh();
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }

    public function update($id, $data)
    {
        try {
            $timeline = [];
            
            error_log(json_encode($data));
            foreach ($data['timeline_name'] as $key => $value) {
                $timeline[$key] = [$value, $data['timeline_time'][$key], $data['timeline_time_end'][$key]];
            }



            $proker = Proker::find($id);
            $proker->name = $data['name'] ?? $proker->name;
            $proker->description = $data['description'] ?? $proker->description;
            $proker->is_registration_open = $data['is_registration_open'] ?? '0';
            $proker->status = $data['status'] ?? '0';
            $proker->link_registration = $data['link_registration'] ?? '';
            $proker->link_instagram = $data['link_instagram'] ?? '';
            $proker->link_storage_document = $data['link_storage_document'] ?? '';
            $proker->link_storage_certificate = $data['link_storage_certificate'] ?? '';
            $proker->link_storage_pdd_documentation = $data['link_storage_pdd_documentation'] ?? '';
            $proker->link_contact_person = $data['link_contact_person'] ?? '';
            $proker->timeline = $timeline;
            $proker->is_timeline_open = $data['is_timeline_open'] ?? false;

            $proker->is_dokumentasi_open = $data['is_dokumentasi_open'] ?? false;

            $dokumetasi = $proker->dokumentasi ?? [];
            
            if(isset($data['dokumentasi'])){
                foreach ($data['dokumentasi'] as $key => $value) {
                    if (file_exists(storage_path('app/public/' . $value))) {
                        \Storage::delete('public/' . $value);
                    }
                    array_push($dokumetasi, $data['dokumentasi'][$key]->store('photo/proker', 'public'));
                }
            }
            // check if has photo request
            if (isset($data['logo'])) {
                if ($proker->logo && file_exists(storage_path('app/public/' . $proker->logo))) {
                    \Storage::delete('public/' . $proker->logo);
                }
                $proker->logo = $data['logo']->store('photo/proker', 'public');
            }
            $proker->dokumentasi = $dokumetasi;

            $proker->save();
            return $proker;
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

        $result = \DB::table('prokers')->whereRaw($query)->update(['status' => $status]);

        return $result;
    }
}
