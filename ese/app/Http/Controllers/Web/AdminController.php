<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Validator;
use Hash;
use Socialite;
use Carbon\Carbon;
use Cocur\Slugify\Slugify;
use Jenssegers\Agent\Agent;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Services\DataTable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AdminController extends Controller
{
	protected $instance;
	
	protected $config_main;
	
	protected $config_language;
	
	public function __construct()
	{
		$this->instance = $this->instance(\App\Http\Controllers\Helper\Back\Helper::class);
		$this->config_main = $this->instance->getConfig();
		$this->config_language = $this->instance->getConfigLanguage();
	}
	
	public function admin_logout_index(Request $request)
	{
        Auth::guard('admin')->logout();
        return redirect()->route('admin.index');;
	}

	public function admin_login_action(Request $request)
	{
		$rules = array(
            'email' => 'required',
            'password' => 'required|min:6'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('admin.login')->withErrors('Vui lòng kiểm tra lại tài khoản');
        } else {
            try {
                $user = $this->instance->postLoginAdmin($request);
                if (!empty($user)) {
                    return redirect()->route('admin.index');
                } else {
                    return redirect()->route('admin.login')->withErrors('Vui lòng kiểm tra lại tài khoản');
                }
           } catch (\Exception $e) {
               return redirect()->route('admin.login')->withErrors('Vui lòng kiểm tra lại tài khoản');
           }
        }
	}

	public function admin_login_index(Request $request)
	{
		try {
            if(Auth::guard('admin')->user()) {
                return redirect()->route('admin.index');
            }
			return view('theme.backend.page.login');
        } catch (\Exception $e) {
            return abort(404);
		}
	}

	public function admin_home_index(Request $request)
	{
		try {
			return view('theme.backend.page.home');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	public function admin_post_advertise_ajax(Request $request)
	{
		$rules = array(
			'type' => 'required|digits_between:1,10',
			'content' => 'min:1|max:5000',
			'position' => 'digits_between:1,10',
			'target' => 'digits_between:1,10',
			'link' => 'nullable|url|max:200',
			'start_date' => 'required|date_format:Y-m-d',
			'end_date' => 'nullable|date_format:Y-m-d|after:today',
			'status' => 'nullable|in:on,off',
			'image_hash' => 'nullable|base64image',
			'action' => 'required|in:insert,update,delete',
		);
		if($request->action == 'update') {
			$rules['id'] = 'required|digits_between:1,10';
		} else if($request->action == 'delete') {
			$rules = array('id' => 'required|digits_between:1,10');
		}
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
			return self::JsonExport(403, $validator->errors());
        } else {
            try {
				$instance = self::instance(\App\Http\Controllers\Helper\Back\Advertise::class);
                $data = $instance->postAdvertise($request);
                if ($data === true) {
                    return self::JsonExport(200, 'Cập nhật thông tin thành công');
                } else {
                    return self::JsonExport(403, 'Vui lòng kiểm tra lại thông tin 2');
                }
			} catch (\Exception $e) {
				return self::JsonExport(500, 'Vui lòng kiểm tra lại thông tin 3');
			}
        }
	}
	
	public function admin_advertise_ajax(Request $request)
	{
		$instance = self::instance(\App\Http\Controllers\Helper\Back\Advertise::class);
		if($request->has('id') && !empty($request->id)) {
			return $data = $instance->getAdvertise($request->id);
		}
		return $data = $instance->getDTAdvertise();
	}

	public function admin_advertise_index(Request $request)
	{
		try {
			return view('theme.backend.page.advertise');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_setting_index(Request $request)
	{
		try {
			return view('theme.backend.page.setting');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_email_index(Request $request)
	{
		try {
			return view('theme.backend.page.email');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_group_email_index(Request $request)
	{
		try {
			return view('theme.backend.page.group_email');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_client_index(Request $request)
	{
		try {
			return view('theme.backend.page.client');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_client_ajax(Request $request)
	{
		$instance = self::instance(\App\Http\Controllers\Helper\Back\Client::class);
		if($request->has('id') && !empty($request->id)) {
			return $data = $instance->getClient($request->id);
		}
		return $data = $instance->getDTClient();
	}
	
	public function admin_employee_index(Request $request)
	{
		try {
			return view('theme.backend.page.employee');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_customer_index(Request $request)
	{
		try {
			return view('theme.backend.page.customer');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_visiter_index(Request $request)
	{
		try {
			return view('theme.backend.page.visiter');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_search_index(Request $request)
	{
		try {
			return view('theme.backend.page.search');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_place_index(Request $request)
	{
		try {
			return view('theme.backend.page.place');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_role_index(Request $request)
	{
		try {
			return view('theme.backend.page.role');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_news_index(Request $request)
	{
		try {
			return view('theme.backend.page.news');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_localization_index(Request $request)
	{
		try {
			return view('theme.backend.page.localization');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_chart_index(Request $request)
	{
		try {
			return view('theme.backend.page.chart');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_menu_index(Request $request)
	{
		try {
			return view('theme.backend.page.menu');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_attribute_index(Request $request)
	{
		try {
			return view('theme.backend.page.attribute');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_event_index(Request $request)
	{
		try {
			return view('theme.backend.page.event');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_language_index(Request $request)
	{
		try {
			return view('theme.backend.page.language');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_room_index(Request $request)
	{
		try {
			return view('theme.backend.page.room');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_type_school_index(Request $request)
	{
		try {
			return view('theme.backend.page.type_school');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_level_school_index(Request $request)
	{
		try {
			return view('theme.backend.page.level_school');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	
	public function admin_school_index(Request $request)
	{
		try {
			return view('theme.backend.page.school');
		} catch (\Exception $e) {
			return abort(404);
		}
	}
}