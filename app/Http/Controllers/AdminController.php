<?php

namespace App\Http\Controllers;
use App\Models\Social; //sử dụng model Social
use Socialite; //sử dụng Socialite
use App\Models\Login;//sử dụng model Login
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;//trả về
session_start();
class AdminController extends Controller
{


    public function login_google(){
        return Socialite::driver('google')->redirect();
   }
public function callback_google(){
        $users = Socialite::driver('google')->stateless()->user(); 
        // return $users->id;
        $authUser = $this->findOrCreateUser($users,'google');
        $account_name = Login::where('admin_id',$authUser->user)->first();
        Session::put('admin_name',$account_name->admin_name);
        Session::put('admin_id',$account_name->admin_id);
        return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
      
       
    }
    public function findOrCreateUser($users,$provider){
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if($authUser){

            return $authUser;
        }
      
        $bao = new Social([
            'provider_user_id' => $users->id,
            'provider' => strtoupper($provider)
        ]);

        $orang = Login::where('admin_email',$users->email)->first();

            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $users->name,
                    'admin_email' => $users->email,
                    'admin_password' => '',
                    'admin_phone' => ''
                    // 'admin_status' => 1
                ]);
            }
        $bao->login()->associate($orang);
        $bao->save();

        $account_name = Login::where('admin_id',$authUser->user)->first();
        Session::put('admin_name',$account_name->admin_name);
        Session::put('admin_id',$account_name->admin_id);
        return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');


    }

    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri  
            $account_name = Login::where('admin_id',$account->user)->first();

            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
 
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $bao = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('admin_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => ''


                ]);
            }
            $bao->login()->associate($orang);
            $bao->save();

            $account_name = Login::where('admin_id',$bao->user)->first();

            Session::put('admin_name',$account_name->admin_name);
             Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        } 
    }

    public function AuthLogin()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id)
        {
            return redirect('admin.dashboard');
        }
        else
        {
            return redirect('admin')->send();
        }
    }


    public function index()
    {
        return view('admin_login');
    }
    public function showdashboard()
    {
        $this->AuthLogin(); 
        return view('admin.dashboard');
    }
    public function dashboard(Request $request) 
    {
        $admin_email=$request->Admin_Email;
        $admin_password=md5($request->Admin_Password);

        $result=DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
       
        if($result)
        {
           Session::put('admin_name', $result->admin_name);
           Session::put('admin_id', $result->admin_id);
            return Redirect::to('/dashboard');
        }
        else
        {
           Session::put('message','mật khẩu hoặc tài khoản bị sai,nhập lại');
            return Redirect::to('/admin');

        }
       // return view('admin.dashboard');

    }
    public function log_out()
    {
        $this->AuthLogin(); 
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
}
