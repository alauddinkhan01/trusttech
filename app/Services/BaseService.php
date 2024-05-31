<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class BaseService
{

    public function __construct()
    {
        //
    }

    public function sendResponse($data, $success = true, $errors = null)
    {
        $response = [
            'success' => $success,
            'errors' => $errors,
            'data'    => $data,
        ];

        return response()->json($response, 200);
    }


    public function sendErrorResponse($type, $message)
    {
        $response = [
            'success' => false,
            'data'    => null,
            'errors' => [
                [
                    "type" => $type,
                    "message" => $message
                ]
            ]
        ];

        return response()->json($response, 200);
    }

    public function storeFile($file,$folderName)
    {
        if ($file) {
            $image = $file;
            $imagePath = $image->hashName($folderName); // Generate a unique name
            
            // Resize the image using Intervention Image
            $resizedImage = Image::make($image)->resize(800, 800, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');

            // store image
            Storage::disk('public')->put($imagePath, $resizedImage);
            
            return '/'.'storage/'.$imagePath;
        }

        return null;
    }

    public function handleException(\Throwable $th, $method)
    {
        $error = [
            'Exception' => get_class($th),
            'Message' => $th->getMessage(),
            'File' => $th->getFile(),
            'Line' => $th->getLine(),
        ];

        $this->generateLogs(
            $error,
            $method . ' - Catch Exception',
            'error'
        );

        return [
            'success' => false,
            'message' => "{$th->getMessage()}  File: {$th->getFile()}  Line  {$th->getLine()}",
        ];
    }


    public function generateLogs($data, $apiName, $type = "info")
    {
        Log::$type($apiName, $data);
    }
}
