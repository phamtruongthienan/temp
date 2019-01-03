<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    static public function JsonExport($code, $msg, $data = null, $optinal = null)
    {
        $callback = [
            'code' => $code,
            'msg' => $msg
        ];
        if ($data != null) {
            $callback['data'] = $data;
        } else {
            $callback['data'] = (object)[];
        }
        if ($optinal != null && is_array($optinal)) {
            if (is_array($optinal[0])) {
                for ($i = 0; $i < count($optinal); $i++) {
                    $callback[$optinal[$i]['name']] = $optinal[$i]['data'];
                }
            } else {
                $callback[$optinal['name']] = $optinal['data'];
            }
        }
        return response()->json($callback, 200, [], JSON_NUMERIC_CHECK);
    }

    static public function Pagination($result, $page, $record = 10)
    {
        if ($record != null && $page != null) {
            $count_all = $result->count();
            $custom = collect(['recordsTotal' => $count_all, 'recordsFiltered' => $count_all]);
            $pagination = $result->paginate($record, ['*'], 'page', $page)->appends(Input::except('page'));
            $data = $custom->merge($pagination);
            return $data;
        } else {
            return $result->get();
        }
    }
    
    public function DecodeImage($file) {
        $file_tmp = explode(';', $file);
        $file_tmp1 = explode(',', $file_tmp[1]);
        return base64_decode($file_tmp1[1]);
    }


    static public function instance($class)
    {
        $instantiator = new \Doctrine\Instantiator\Instantiator();
        $instance = $instantiator->instantiate($class);
        return $instance;
    }

}
