<?php

namespace App\Exports\Dashboard\Admin;

use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KeanggotaanExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('dashboard.admin.exports.keanggotaan', [
            'users' => User::all(),
            'today' => Carbon::now()->format('d M Y')
        ]);
    }
}
