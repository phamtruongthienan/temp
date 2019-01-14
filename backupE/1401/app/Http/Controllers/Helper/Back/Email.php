<?php

namespace App\Http\Controllers\Helper\Back;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\Datatables\Datatables;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Filter;
use GuzzleHttp\Client;
use Validator;
use Hash;
use Socialite;
use Auth;
use Carbon\Carbon;
use App\Models\MAdvert;
use App\Models\MUser;
use App\Models\MEmail;
use App\Models\MActivityLog;
use App\Models\MCustomer;
use App\Models\ConfigEmail;
use Activity;
use App\Models\MMenu;

class Email extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $lang;
    protected $lang_id;

    public function __construct()
    {
        $this->lang = LaravelLocalization::getCurrentLocale();
        $this->lang_id = LaravelLocalization::getCurrentLocaleID();
    }

    public function getDTEmail()
    {
        self::__construct();
        try {
            $data = ConfigEmail::all();
            return Datatables::of($data)
            ->editColumn('action', function ($v){
                return '<a' .
							' class="table-action table-action-edit text-green cursor-pointer" data-id="' . $v->id . '"><i' .
							' class="fa fa-edit"></i></a>' .
							' <a class="table-action text-red table-action-delete cursor-pointer" data-id="' . $v->id . '"><i' .
							' class="fa fa-trash"></i></a>';
            })
            ->editColumn('default', function ($v){
                if($v->default == 1){
                    return '<i class="fas fa-check-circle text-green"></i>';
                } else {
                    return '';
                }
            })
            
            ->rawColumns(['id','smtp_server','smtp_port','smtp_username','smtp_protocol','smtp_name','default','action'])
            ->make(true);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getEmail($id)
    {
        self::__construct();
        try {
            $data = ConfigEmail::where('id',$id)->get();
            if (!empty($data)) {
                return self::JsonExport(200, 'success', $data);
            } else {
                return self::JsonExport(404, 'error', null);
            }
        } catch (\Exception $e) {
            return self::JsonExport(500, 'error', null);
        }
    }

    public function getDTEmailStatus()
    {
        self::__construct();
        try {
            $data = MEmail::with('mGroupEmail');
            return Datatables::of($data)
            ->editColumn('action', function ($v){
                return ' <a class="table-action text-red table-action-delete cursor-pointer" data-id="' . $v->id . '"><i' .
                ' class="fa fa-trash"></i></a>';
            })
            ->editColumn('group', function ($v){
                return $v->mGroupEmail->name;
            })
            ->editColumn('status', function ($v){
                if($v->status == 1){
                    return '<i class="fas fa-check-circle text-green"></i>';
                } else {
                    return '';
                }
            })
            ->rawColumns(['id','title','content','group','created_at','status','action'])
            ->make(true);
        } catch (\Exception $e) {
            return null;
        }
    }

}