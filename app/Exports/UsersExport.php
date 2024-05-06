<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromQuery, WithMapping, WithStyles
{
    use Exportable;

    private $i = 0;
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    public function query()
    {
        return User::query();
    }
    // public function collection()
    // {
    //     return User::all();
    // }
    public function headings(): array
    {
        return [
            'No',
            'Nama Lengkap',
            'Nim',
            'Email',
            'Nomor Hp',
            'Status',
            'Angkatan',
            'Data Dibuat',
        ];
    }
    public function map($user): array
    {
        return [
            strval(++$this->i),
            $user->name,
            $user->nim,
            $user->email,
            $user->phone,
            $user->status == '1' ? 'Aktif' : 'Tidak Aktif',
            $user->year_entry,
            \Carbon\Carbon::parse($user->created_at)->toDayDateTimeString(),
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => [
                'font' => ['bold' => true],
                'borders' => [
                    'bottom' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOUBLE,
                    ]
                ]
            ],
        ];
    }
}
