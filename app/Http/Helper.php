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

if (!function_exists('formatTimeRange')) {
    function formatTimeRange($start, $end)
    {
        // Create DateTime objects for start and end
        $startDateTime = new DateTime($start);
        $endDateTime = new DateTime($end);
    
        // Check if the start and end dates are the same
        if ($startDateTime->format('Y-m-d') === $endDateTime->format('Y-m-d')) {
            // Format: 08:00 - 17:00, 22 November 2024
            return $startDateTime->format('H:i') . ' - ' . $endDateTime->format('H:i') . ', ' . $startDateTime->format('d F Y');
        } else {
            // Format: 08:00, 22 November 2024 sampai dengan 12:00, 23 November 2024
            return $startDateTime->format('H:i, d F Y') . ' sampai dengan ' . $endDateTime->format('H:i, d F Y');
        }
    }
}
