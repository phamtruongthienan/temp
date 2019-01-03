<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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


class NewsController extends Controller
{
    protected $instance;

    public function __construct()
    {
        $this->instance = $this->instance(\App\Http\Controllers\Helper\Front\Helper::class);
    }

    public function home_press(Request $request)
    {
        try {
            $view = $this->instance->getView($request->slug);
            $view_slug = $this->instance->getViewTranslation($request->slug);
            $list_news = $this->instance->newsDetails($request->slug);
            if (!empty($view)) {
                $callback = [
                    'view_slug' => $view_slug,
                    'list_news' => $list_news,
                    'details' => 1,
                    'view' => $view,
                    'menu' => $this->instance->getMenu()
                ];
                return view('theme.frontend.page.aboutus')->with($callback);
            } else {
                return abort(404);
            }
        } catch (\Exception $e) {
            return abort(404);
        }
    }

    public function home_category(Request $request)
    {
        try {
            $view = $this->instance->listCategory($request->slug);
            $callback = [
                'list_news' => $view,
                'menu' => $this->instance->getMenu()
            ];
            if (!empty($callback)) {
                return view('theme.frontend.page.news')->with($callback);
            } else {
                return abort(404);
            }
        } catch (\Exception $e) {
            return abort(404);
        }
    }

    public function course_detail(Request $request)
    {
        try {
            $detail = $this->instance->courseDetail($request->slug);
            $callback = [
                'detail' => $detail,
                'menu' => $this->instance->getMenu()
            ];
            if (!empty($callback)) {
                return view('theme.frontend.page.course_detail')->with($callback);
            } else {
                return abort(404);
            }
        } catch (\Exception $e) {
            return abort(404);
        }
    }
}
