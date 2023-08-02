<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Http extends Model
{
    use HasFactory;
    
    public function get($enlace){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('APP_URL_API').$enlace,// your preferred link
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return (json_decode($response));
        }
    }
    public function post($enlace,$body, $file = null){
        $curl = curl_init();

        // Datos adicionales necesarios para el envío de archivos
        $fileField = 'file_upload'; // Nombre del campo que esperas en tu API para el archivo

        curl_setopt_array($curl, array(
            CURLOPT_URL => env('APP_URL_API') . $enlace,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $file ? $this->buildPostData($body, $file, $fileField) : json_encode($body),
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Content-Type: " . ($file ? "multipart/form-data" : "application/json"), // Usamos 'multipart/form-data' si hay un archivo
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return (json_decode($response));
        }
    }

    public function upd($enlace,$body){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('APP_URL_API').$enlace,// your preferred url
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "Accept: application/json",
                "Content-Type: application/json",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return (json_decode($response));
        }
    }
    
    public function del($enlace){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('APP_URL_API').$enlace,// your preferred link
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return (json_decode($response));
        }
    }
    
    private function buildPostData($data, $file, $fileField)
    {
        $postData = array();

        // Agregar campos de datos adicionales
        foreach ($data as $key => $value) {
            $postData[$key] = $value;
        }

        // Agregar el archivo al cuerpo de la solicitud
        $postData[$fileField] = curl_file_create($file->getRealPath(), $file->getClientMimeType(), $file->getClientOriginalName());

        return $postData;
    }
}