<?php

namespace App\Http\Controllers\Helper\Front;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Filter;
use GuzzleHttp\Client;
use Validator;
use Hash;
use Socialite;
use Auth;
use Carbon\Carbon;
use App\Models\MMenu;
use App\Models\ConfigLanguage;
use App\Models\ConfigCity;
use App\Models\MSchool;
use App\Models\ConfigMain;
use App\Models\ConfigOther;
use App\Models\MSchoolEvent;
use App\Models\MClient;
use App\Models\MCustomer;
use App\Models\MNews;
use App\Models\MLayout;
use App\Models\MNewsTranslation;
use App\Models\MSubscribe;
use App\Models\MSchoolAttribute;
use App\Models\MAdvert;
use App\Models\MSchoolCategory;
use App\Models\MSchoolComment;
use App\Models\MSchoolCommentRating;
use App\Models\MSchoolType;
use App\Models\MSchoolLevel;
use App\Models\MSchoolLanguage;
use App\Models\MRating;
use App\Models\MWishlist;
use App\Models\MChild;

class Helper extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $lang;
    protected $lang_id;

    public function __construct()
    {
        $this->lang = LaravelLocalization::getCurrentLocale();
        $this->lang_id = LaravelLocalization::getCurrentLocaleID();
    }

    public function getChild($id) {
        self::__construct();
        try {
            if (Auth::check()) {
                $customer = QueryBuilder::for(MChild::class)
                ->allowedIncludes(
                    'm_customer',
                    'm_school.m_schooltranslations'
                )
                ->where('customer_id', Auth::user()->id)
                ->where('id', $id)
                ->first();
                if (!empty($customer)) {
                    return $customer;
                } else {
                    return null;
                }
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getAccount() {
        self::__construct();
        try {
            if (Auth::check()) {
                $customer = QueryBuilder::for(MCustomer::class)
                ->allowedIncludes(
                    'm_children.m_school.m_schooltranslations',
                    'm_wishlists.m_school.m_schooltranslations'
                )
                ->where('id', Auth::user()->id)
                ->first();
                if (!empty($customer)) {
                    return $customer;
                } else {
                    return null;
                }
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getMenu()
    {
        self::__construct();
        try {
            $menu = MMenu::with('mNews.mNewsTranslations', 'mMenuTranslations')->get();
            if (!empty($menu)) {
                return $menu;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getCity($keyword)
    {
        self::__construct();
        try {
            if (!empty($keyword)) {
                $city = ConfigCity::search($keyword)->get();
            } else {
                $city = ConfigCity::get();
            }
            if (!empty($city)) {
                return $city;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getSchool($limit = 8, $pagination = null, $sorts = null, $listID = null)
    {
        self::__construct();

        try {
            $school = QueryBuilder::for(MSchool::class)
                ->allowedIncludes(
                    'm_schoolimages',
                    'm_schoollevel.m_schoolleveltranslations',
                    'm_schooltype.m_schooltypetranslations',
                    'm_schooltranslations',
                    'm_schoollanguagecourses.m_school',
                    'm_schoollanguagecourses.m_schoollanguage.m_schoollanguagetranslations',
                    'm_schoolcomments.m_customer',
                    'm_schoolcomments.m_schoolcommentreplies',
                    'm_schoolattributeratings.m_schoolattribute.m_schoolattributetranslations',
                    'm_schoolcommentratings.m_customer',
                    'm_schoolcommentratings.m_schoolcategory',
                    'm_schoolscores',
                    'm_schoolcourses.m_schoolclass.m_schoolclasstranslations',
                    'm_schoolcourses.m_schoolcoursetranslations',
                    'm_schoolcourses.m_schoolprograms',
                    'm_schoolattributeaddons.m_schoolattributeaddontranslations',
                    'm_schoolteachers.m_schoolteachertranslations',
                    'm_wishlists',
                    'config_city'
                )
                ->allowedAppends('rating', 'review')
                ->allowedFilters('name', 'status')
                ->where('status', 1);
                if($listID !== null) {
                    $school = $school->whereIn('id', $listID);
                }
                if($sorts !== null) {
                    $school = $school->orderBy('tuition', $sorts);
                }
                if($pagination !== null) {
                    $school = $school->paginate(config('constant.pagination'));
                } 

                if($limit !== null) {
                    $school = $school->take($limit)->get();
                }

                if($pagination === null && $limit === null) {
                    $school = $school->get();
                }

            if (!empty($school)) {
                return $school;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function postReviewSchool($request){
        self::__construct();
        try {
            DB::beginTransaction();
            $check_school = MSchool::where('id', $request->school_id)->count();
            if($check_school > 0) {
                $new_comment_data = [
                    'customer_id' => Auth::user()->id,
                    'content' => $request->comment,
                    'rating' => $request->rating,
                    'school_id' => $request->school_id,
                    'status' => 0,
                ];
                $new_comment = MSchoolComment::insertGetId($new_comment_data);
                if($new_comment) {
                    DB::commit();
                    return true;
                } else {
                    DB::rollBack();
                    return false;
                }
            } else {
                DB::rollBack();
                return null;
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return null;
        }
    }

    public function postRatingSchool($request){
        self::__construct();
        try {
            DB::beginTransaction();
            $check_rating = MSchoolCommentRating::where('customer_id', Auth::user()->id)->where('category_id', $request->category_id)->where('school_id', $request->school_id)->count();
            if($check_rating > 0) {
                DB::rollBack();
                return false;
            }
            $check_category = MSchoolCategory::where('id', $request->category_id)->count();
            if($check_category != 1) {
                DB::rollBack();
                return false;
            }
            $check_school = MSchool::where('id', $request->school_id)->count();
            if($check_school > 0) {
                $new_rating_data = [
                    'customer_id' => Auth::user()->id,
                    'category_id' => $request->category_id,
                    'rating' => $request->rating,
                    'school_id' => $request->school_id
                ];
                $new_rating = MSchoolCommentRating::insertGetId($new_rating_data);
                if($new_rating) {
                    DB::commit();
                    return true;
                } else {
                    DB::rollBack();
                    return false;
                }
            } else {
                DB::rollBack();
                return null;
            }
            
        } catch (\Exception $e) {
            DB::rollBack();
            return null;
        }
    }

    public function getCategory() 
    {
        self::__construct();

        try {
            $category = QueryBuilder::for(MSchoolCategory::class)
                ->allowedIncludes(
                    'm_schoolcategorytranslations'
                )
                ->orderBy('created_at', 'desc')
                ->get();
            if (!empty($category)) {
                return $category;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getReviewSchoolbyMe($id) 
    {
        self::__construct();
        try {
            $school = MSchoolComment::where('customer_id', Auth::user()->id)->where('school_id', $id);
            if ($school->count() > 0) {
                return $school->first();
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getWishlist($id, $action) {
        self::__construct();
        try {
            DB::beginTransaction();
           
            $wl = MWishlist::where('customer_id', Auth::user()->id)->where('school_id', $id);
            if($action == 0) {
                if ($wl->count() > 0) {
                    $wl->delete();
                    if($wl) {
                        DB::commit();
                        return true;
                    } else {
                        DB::rollback();
                        return false;
                    }
                } else {
                    DB::rollback();
                    return false;
                }
            } else {
                if ($wl->count() > 0) {
                    DB::rollback();
                    return false;
                } else {
                    $new_wl = MWishlist::insertGetId([
                        'customer_id' => Auth::user()->id,
                        'school_id' => $id
                    ]);
                    if($new_wl) {
                        DB::commit();
                        return true;
                    } else {
                        DB::rollback();
                        return false;
                    }
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function getSchoolDetail($id)
    {
        self::__construct();

        try {
            $school = QueryBuilder::for(MSchool::class)
                ->allowedIncludes(
                    'm_schoolimages',
                    'm_schoollevel.m_schoolleveltranslations',
                    'm_schooltype.m_schooltypetranslations',
                    'm_schooltranslations',
                    'm_schoollanguagecourses.m_school',
                    'm_schoollanguagecourses.m_schoollanguage.m_schoollanguagetranslations',
                    'm_schoolcomments.m_customer',
                    'm_schoolcomments.m_schoolcommentreplies',
                    'm_schoolattributeratings.m_schoolattribute.m_schoolattributetranslations',
                    'm_schoolcommentratings.m_customer',
                    'm_schoolcommentratings.m_schoolcategory',
                    'm_schoolscores',
                    'm_schoolcourses.m_schoolclass.m_schoolclasstranslations',
                    'm_schoolcourses.m_schoolcoursetranslations',
                    'm_schoolcourses.m_schoolprograms',
                    'm_schoolattributeaddons.m_schoolattributeaddontranslations',
                    'm_schoolteachers.m_schoolteachertranslations',
                    'm_wishlists',
                    'config_city'
                )
                ->allowedAppends('rating', 'review')
                ->allowedFilters('name')
                ->where('status', 1)
                ->where('id', $id)
                ->orderBy('created_at', 'desc')
                ->get();
            if (!empty($school)) {
                return $school;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getConfig()
    {
        self::__construct();
        try {
            $config = QueryBuilder::for(ConfigMain::class)
                ->allowedIncludes(
                    'config_maintranslations'
                )->get();
            if (!empty($config)) {
                return $config;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getConfigLanguage($lang = null)
    {
        self::__construct();
        try {
            $config = QueryBuilder::for(ConfigLanguage::class);
            if($lang != null) {
                if(is_numeric($lang)) {
                    $config = $config->where('id', $lang)->get();
                } else {
                    $config = $config->where('code', $lang)->get();
                }
            } else {
                $config = $config->where('id', $this->lang_id)->get();
            }   
            if (!empty($config)) {
                return $config;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }


    public function checkEmailCustomer($email)
    {
        self::__construct();
        try {
            $customer = MCustomer::where('email', $email);
            if ($customer->count() > 0) {
                return $customer->first()->id;
            } else {
                return true;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function registerCustomer($data)
    {
        self::__construct();
        try {
            DB::beginTransaction();
            $new_customer = MCustomer::insertGetId($data);
            if ($new_customer) {
                DB::commit();
                if (Auth::loginUsingId($new_customer)) {
                    return Auth::user();
                }
            } else {
                DB::rollBack();
                return null;
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return null;
        }
    }

    public function loginCustomer($id)
    {
        self::__construct();
        try {
            if (Auth::loginUsingId($id)) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }


    public function getConfigOther($service = null)
    {
        self::__construct();
        try {
            if ($service == 'facebook') {
                $config = QueryBuilder::for(ConfigOther::class)
                    ->where('key', 'FB_APP_ID')
                    ->orWhere('key', 'FB_APP_KEY')
                    ->orWhere('key', 'FB_APP_CALLBACK')
                    ->get();
            } else if($service == 'google') {
                $config = QueryBuilder::for(ConfigOther::class)
                    ->where('key', 'GG_APP_ID')
                    ->orWhere('key', 'GG_APP_KEY')
                    ->orWhere('key', 'GG_APP_CALLBACK')
                    ->get();
            } else {
                $config = QueryBuilder::for(ConfigOther::class)->get();
            }

            if (!empty($config)) {
                return $config;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getPromotion($slug = null, $position = null, $limit = null, $pagination = null)
    {
        self::__construct();
        try {
            $promotion = QueryBuilder::for(MSchoolEvent::class)
                ->allowedIncludes(
                    'm_schooleventtranslations',
                    'm_school'
                )
                ->allowedAppends('school');

            $promotion = $promotion->where('status', 1)->orderBy('created_at', 'desc');

            if(!empty($slug)) {
                $promotion = $promotion->whereHas('mSchoolEventTranslations', function ($query) use ($slug) {
                        $query->where('slug', $slug);
                });
            } 

            if (!empty($position)) {
                $promotion = $promotion->where('position', $position);
            }

            if(!empty($exclude)) {
                $promotion = $promotion->where('id', '!=', $exclude);
            }

            if ($pagination != null) {
                $promotion = $promotion->paginate(config('constant.pagination'));
            } else {
                if ($limit != null) {
                    $promotion = $promotion->take($limit)->get();
                } else {
                    $promotion = $promotion->get();
                }
            }

            if (!empty($promotion)) {
                return $promotion;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getClient($limit = 8)
    {
        self::__construct();
        try {
            $config = QueryBuilder::for(MClient::class)
                ->allowedIncludes(
                    'm_clienttranslations.m_school.m_schooltranslations'
                )
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->take($limit)
                ->get();
            if (!empty($config)) {
                return $config;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getSchoolService() 
    {
        self::__construct();
        try {
            $result = QueryBuilder::for(MSchoolAttribute::class)
                ->allowedIncludes(
                    'm_schoolattributetranslations'
                )
                ->orderBy('created_at', 'desc')
                ->get();
            if (!empty($result)) {
                return $result;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
       }
    }

    public function getRating() 
    {
        self::__construct();
        try {
            $result = QueryBuilder::for(MRating::class)
                ->allowedIncludes(
                    'm_ratingtranslations'
                )
                ->orderBy('rating', 'asc')
                ->get();
            if (!empty($result)) {
                return $result;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
       }
    }

    public function getSchoolType() 
    {
        self::__construct();
        try {
            $result = QueryBuilder::for(MSchoolType::class)
                ->allowedIncludes(
                    'm_schooltypetranslations'
                )
                ->orderBy('created_at', 'desc')
                ->get();
            if (!empty($result)) {
                return $result;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
       }
    }

    public function getSchoolLevel() 
    {
        self::__construct();
        try {
            $result = QueryBuilder::for(MSchoolLevel::class)
                ->allowedIncludes(
                    'm_schoolleveltranslations'
                )
                ->orderBy('created_at', 'desc')
                ->get();
            if (!empty($result)) {
                return $result;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
       }
    }

    public function getSchoolLanguage() 
    {
        self::__construct();
        try {
            $result = QueryBuilder::for(MSchoolLanguage::class)
                ->allowedIncludes(
                    'm_schoollanguagetranslations'
                )
                ->orderBy('created_at', 'desc')
                ->get();
            if (!empty($result)) {
                return $result;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
       }
    }

    public function getAds($position = null, $limit = 3)
    {
        self::__construct();
        try {
            $position = MAdvert::groupBy('position')->pluck('position');
            $data = [];
            foreach($position as $k => $v) {
                $list = MAdvert::where('position', $v)
                                ->where('status', 1)
                                ->whereDate('end_date', '>=', Carbon::now())
                                ->take($limit)
                                ->pluck('id');
                foreach($list as $item => $id) {
                    array_push($data, $id);
                }
            }
            $config = QueryBuilder::for(MAdvert::class)
                ->allowedIncludes(
                    'm_advertstranslations'
                )
                ->whereIn('id', $data)
                ->orderBy('created_at', 'desc')
                ->get();
            if (!empty($config)) {
                return $config;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
       }
    }

    public function getLoc() {
        $client = new Client();
        $res = $client->request('GET', 'http://ipinfo.io/'.$_SERVER['REMOTE_ADDR'].'/geo');
        $body =  json_decode($res->getBody());
        if(isset($body) && !empty($body)) {
            if(isset($body->loc)) {
                return $body->loc;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function postSignupCustomer($request)
    {
        self::__construct();
        try {
            DB::beginTransaction();
            $check_user = MCustomer::where('email', $request->email)->count();
            if($check_user > 0) {
                DB::rollBack();
                return null;
            }
            $data = [
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'name' => $request->name,
                'phone' => $request->phone
            ];
            $loc = $this->getLoc(); 
            if($loc !== null) {
                $latlng = explode(',', $loc);
                $data['lat'] =  $latlng[0];
                $data['lng'] =  $latlng[1];
            }

            $create_user = $this->registerCustomer($data);
            if($create_user) {
                DB::commit();
                return $create_user;
            } else {
                DB::rollBack();
                return null;
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return null;
        }
    }

    public function postLoginCustomer($request)
    {
        self::__construct();
        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
                return Auth::user();
            } else {
                Auth::logout();
                return null;
            }
        } catch (\Exception $e) {
            Auth::logout();
            return null;
        }
    }

    public function getAttribute() {
        self::__construct();
        try {
            $info = MSchoolAttribute::with('mSchoolAttributeTranslations')->where('search', 1);
            if ($info->count() > 0) {
                return $info->get()->groupBy('icon');
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getView($slug)
    {
        self::__construct();

        try {
            $info = QueryBuilder::for(MNewsTranslation::class)
                ->allowedIncludes(
                    'm_news.m_layout',
                    'm.news.m_newstranslations',
                    'm_news.m_menus.m_menutranslations'
                )
                ->where('slug', 'press/' . $slug);
            if ($info->count() > 0) {
                return $info->first();
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getViewTranslation($slug)
    {
        self::__construct();
        try {
            $main = MNewsTranslation::where('slug', 'press/' . $slug);
            if ($main->count() > 0) {
                $main = $main->first();
                $info = QueryBuilder::for(MNewsTranslation::class)
                    ->allowedIncludes(
                        'm_news.m_layout',
                        'm.news.m_newstranslations',
                        'm_news.m_menus.m_menutranslations'
                    )
                    ->where('translation_id', $main->translation_id)
                    ->where('slug', '!=', 'press/' . $slug);
                if ($info->count() > 0) {
                    return $info->first();
                } else {
                    return null;
                }
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getListNews(){
        self::__construct();
        try {
            $config = QueryBuilder::for(MNews::class)
            ->allowedIncludes(
                'm_newstranslations'
            )->where('status',1)->where('layout_id',5);
            if (!empty($config)) {
                return $config->get();
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function newsDetails($slug){
        self::__construct();
        try {
            $config = QueryBuilder::for(MNewsTranslation::class)
            ->allowedIncludes(
                'm_news'
            )->where('slug','news/'.$slug);
            if (!empty($config)) {
                return $config->get();
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getSubscribes($email) {
        self::__construct();
        try {
            $check = MSubscribe::where('email', $email);
            if ($check->count() > 0) {
                return 'Email đã được đăng ký nhận tin.';
            } else {
                $new_subscribe = new MSubscribe();
                $new_subscribe->email = $email;
                $new_subscribe->status = 1;
                $new_subscribe->save();
                if($new_subscribe) {
                    return true;
                } else {
                    return 'Có lỗi trong quá trình xử lý';
                }
            }
        } catch (\Exception $e) {
            return 'Có lỗi trong quá trình xử lý';
        }
    }

    public function postEditUser($request) {
        self::__construct();
        try {
            DB::beginTransaction();
            if (!Auth::check()) {
                return false;
            } else {
                $user= MCustomer::where('id', Auth::user()->id)->where('status',1)->first();
                $user->name= $request->fullName;
                $user->dob = $request->birthday;
                $user->phone = $request->phone;
                $user->gender = $request->gender;
                
                
                $user->update();
                if($user) {
                    DB::commit();
                    return true;
                } else {
                    DB::rollBack();
                    return 'Có lỗi trong quá trình xử lý';
                }
            }
        } catch (\Exception $e) {
            return 'Có lỗi trong quá trình xử lý';
        }
    }

    public function postEditChild($request) {
        self::__construct();
        try { 
            DB::beginTransaction();    
            //return $request->idChild."----".$request->nameChild."----".$request->gender."----".$request->birthday."----".$request->gen;
            // $user= MChild::where('id', $request->idChild)->first();
            // $user->name= $request->nameChild;
            // $user->dob = $request->birthday;
            // $user->gender = $request->gender;
            $gen = $request->gen;
            $gen = explode(',',$gen);
            $gen = json_encode($gen);
            $data = [
               'name' =>  $request->nameChild,
               'dob'  => $request->birthday,
               'gender' => $request->gender,
               'genitive' => $gen
            ];
            $user = MChild::where('id', $request->idChild)->update($data);
            if($user) {
                DB::commit();
                return "true";
            } else {
                DB::rollBack();
                return 'Có lỗi trong quá trình xử lý';
            }
            
        } catch (\Exception $e) {
            return $e.'Có lỗi trong quá trình xử lý';
        }
    }

    // public function postAddChild($request) {
    //     self::__construct();
    //     try { 
    //         $gen = $request->gen;
    //         $gen = explode(',',$gen);
    //         $gen = json_encode($gen);
    //         // $data = [
    //         //    'name' =>  $request->nameChild,
    //         //    'dob'  => $request->birthday,
    //         //    'gender' => $request->gender,
    //         //    'genitive' => $gen
    //         // ];
    //         $user = MChild::firstOrCreate($data);
    //         // $user = new MChild();
    //         // $user->name= $request->nameChild;
    //         // $user->dob = $request->birthday;
    //         // $user->gender = $request->gender;
    //         // $user->genitive = $gen;
    //         // $user->save();
    //         if($user) {
    //             return "true";
    //         } else {
    //             return 'Có lỗi trong quá trình xử lý';
    //         }
            
    //     } catch (\Exception $e) {
    //         return $e.'Có lỗi trong quá trình xử lý';
    //     }
    // }


    public function validateLatLong($lat, $long) {
        self::__construct();
        try {
            return preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?),[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $lat.','.$long);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getNearSchool($lat, $long) {
        self::__construct();
        try {
            $result = DB::select( DB::raw("SELECT * FROM some_table WHERE some_col = '$someVariable'") );
        } catch (\Exception $e) {
            return null;
        }
    }


}
