<?php

namespace App\Repositories;

use App\Models\CakapKode;
use Yajra\DataTables\DataTables;
use App\Models\FormCakap;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CakapRepository
{
    /**
     * Get datatable for ajax
     *
     * @return mixed
     */
    public function getDatatable($status)
    {
        $formCakap = null;
        if (!is_null($status)) {
            $formCakap = FormCakap::where('status', '=', $status)->orderBy('created_at', 'desc')->get();
        } else {
            $formCakap = FormCakap::orderBy('created_at', 'desc')->get();
        }
        return DataTables::of($formCakap)
            ->addColumn('nama', function ($formCakap) {
                return $formCakap->nama;
            })
            ->addColumn('email', function ($formCakap) {
                return $formCakap->email;
            })
            ->addColumn('id_form', function ($formCakap) {
                return $formCakap->id_form;
            })
            ->addColumn('status', function ($formCakap) {
                return $formCakap->status;
            })
            ->addColumn('created_at', function ($formCakap) {
                return \Carbon\Carbon::parse($formCakap->created_at)->translatedFormat('d F Y');
            })
            ->addColumn('updated_at', function ($formCakap) {
                return \Carbon\Carbon::parse($formCakap->updated_at)->translatedFormat('d F Y');
            })
            ->make(true);
    }

    public function getDatatableEmail($data)
    {
        $kode_cakaps = CakapKode::select('kode')->doesntHave('formCakap')->take(count($data['nama']))->get();
        $i = 0;
        foreach ($kode_cakaps as $kode_cakap){
            $kode_cakap->id =  $data['id'][$i];
            $kode_cakap->nama =  $data['nama'][$i];
            $kode_cakap->email =  $data['email'][$i];
            $kode_cakap->id_form =  $data['id_form'][$i];
            $kode_cakap->status =  $data['status'][$i];

            $i++;
            
        }

        return DataTables::of($kode_cakaps)
        ->addColumn('id', function ($formCakap){
            return $formCakap->id;
        })
            ->addColumn('nama', function ($formCakap){
                return $formCakap->nama;
            })
            ->addColumn('email', function ($formCakap){
                return $formCakap->email;
            })
            ->addColumn('id_form', function ($formCakap){
                return $formCakap->id_form;
            })
            ->addColumn('status', function ($formCakap){
                return $formCakap->status;
            })
            ->addColumn('kode', function ($formCakap) {
                return $formCakap->kode;
            })
            ->make(true);
    }

    public function getDatatableKode()
    {
        $formCakap = CakapKode::orderBy('created_at', 'desc')->get();
        return DataTables::of($formCakap)
            ->addColumn('kode', function ($formCakap) {
                return $formCakap->kode;
            })
            ->addColumn('created_at', function ($formCakap) {
                return \Carbon\Carbon::parse($formCakap->created_at)->translatedFormat('d F Y');
            })
            ->addColumn('updated_at', function ($formCakap) {
                return \Carbon\Carbon::parse($formCakap->updated_at)->translatedFormat('d F Y');
            })
            ->make(true);
    }

    

    /**
     * @return Collection
     */
    public function get(int $limit = 8, array $condition = [], array $orCondition = [])
    {
        return FormCakap::orderBy('created_at', 'desc')
            ->when(count($condition) > 0, function ($q) use ($condition) {
                $q->where($condition);
            })
            ->when(count($orCondition) > 0, function ($q) use ($orCondition) {
                $q->orWhere($orCondition);
            })
            ->limit($limit)->get();
    }

    public function count(array $condition = [])
    {
        return FormCakap::when(count($condition) > 0, function ($q) use ($condition) {
            $q->where($condition);
        })->count();
    }

    /**
     * Get FormCakap by id
     *
     * @param int $id
     * @return FormCakap
     */
    public function findById($id)
    {
        return FormCakap::find($id);
    }


    
    
    /**
     * @param Request $data
     * @return bool
     */
    public function save($data)
    {
        try {
            $FormCakap = new FormCakap;
            $FormCakap->nama = $data->input('nama');
            $FormCakap->email = $data->input('email');
            $FormCakap->id_form = $data->cookie('id_form');
            $FormCakap->status = '0';
            $FormCakap->created_at = now();
            $FormCakap->save();
            return true;
        } catch (\Throwable $t) {
            dd($t);
            report($t);
            throw $t;
        }
    }

    public function saveKode($data)
    {
        // dd($data);
        try {
            $KodeCakap = CakapKode::updateOrCreate(array('kode' => $data['kode']));
            return $KodeCakap;
        } catch (\Throwable $t) {
            dd($t);
            report($t);
            throw $t;
        }
    }
    /**
     * @param array ids
     */
    public function destroys(array $ids)
    {
        $query = "id = $ids[0]";
        if (count($ids) > 1) {
            foreach ($ids as $i => $id) {
                // skip index 0, already appened on '$query'
                if ($i !== 0) $query .= " or id = $id";
            }
        }

        $result = \DB::table('form_cakaps')->whereRaw($query)->delete();
        return $result;
    }

    public function destroysKode(array $ids)
    {
        $query = "id = $ids[0]";
        if (count($ids) > 1) {
            foreach ($ids as $i => $id) {
                // skip index 0, already appened on '$query'
                if ($i !== 0) $query .= " or id = $id";
            }
        }

        $result = \DB::table('cakap_kodes')->whereRaw($query)->delete();
        return $result;
    }
}