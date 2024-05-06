<?php

if (!function_exists('api_response')) {
    function api_response($success, $message = null, $data = null, $code = 200)
    {
        return response()->json([
            'status' => $success == 1 ? 'success' : 'failed',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}

if (!function_exists('tgl_indo')) {
    function tgl_indo($tanggal)
    {
        $bulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];
        $pecahkan = explode('-', $tanggal);
        $year = isset($pecahkan[2]) ? $pecahkan[2] : '';
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
        return $pecahkan[0] . " " . $bulan[(int) $pecahkan[1]] . " " .$year;
    }
}