<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data) {
            return Response::json([
                'message' => 'success',
                'errors' => false,
                'data' => $data,
            ]);
        });

        Response::macro('error', function ($message, $statusCode = 400) {
            $error_msg = 'Aksi gagal ';

            $statusCode = intval($statusCode);

            if ($statusCode == 0 || $statusCode > 599 || $statusCode < 0) {
                $statusCode = 500;
            }

            if ($statusCode == 500) {
                $message = (env('APP_ENV') == "local" && env('APP_DEBUG') == "true") ? $error_msg . " [" . $message . "]" : $error_msg;
            }

            return Response::json([
                'errors'  => true,
                'message' => $message,
                'status' => $statusCode,
            ], $statusCode);
        });
    }
}
