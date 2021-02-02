<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function uploadFile($name, $destination, $request = null)
    {
        try {
            $image = $request->file($name);
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs($destination, $fileName);
            return ["state" => 1, "filename" => $fileName];
        } catch (\Exception $ex) {
            return ["state" => 0, "filename" => ""];
        }
    }
}
