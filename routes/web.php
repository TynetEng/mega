<?php

use App\Models\Blog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserLoginController;
use PhpParser\Node\Stmt\TryCatch;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// HOME PAGE
Route::get('/', function () {
    return view('welcome');
});
// SIGNUP
Route::get('/signup', function () {
    return view('signup');
});
Route::post('/signup', function ( Request $request) {
    
    $request->validate([
        'email'=>"email|required|unique:users,email",
        'first_name'=>"required",
        'last_name'=>"required",
        'password'=>['required', 'confirmed', Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
        ],
        'password_confirmation'=>'required',
        "phone_number"=>"required|min:11|max:11"
    ]);
    
    try {
        $user= User::create([
            'firstName'=> $request->first_name,
            'lastName'=> $request->last_name,
            'email'=> $request->email,
            'phoneNumber'=> $request->phone_number,
            'password'=>Hash::make($request->password),
        ]);
        
        Auth::loginUsingId($user->id);
        return redirect()->route('login');
    } catch (\Throwable $th) {
        return "error";
    }
})->name('sign');

// GOOGLE SOCIALITE
Route::get('/auth/redirect', 'App\Http\Controllers\UserLoginController@redirect');

// USER GOOGLE LOGIN
Route::get('auth/google/callback', 'App\Http\Controllers\UserLoginController@callback');


// LOGIN
Route::get('/login', function(){
    return view('login');
});
Route::post('/login', function(Request $request){
    $request->validate([
        'email'=>"required|email",
        'password'=>"required"
    ]);
    
    try {
        $token = auth()->attempt(['email'=>$request->email, 'password'=>$request->password], true);
        
        if(!$token){
            session()->flash('error', 'Invalid Login Details');
            return redirect()->back();
        }
        return redirect()->to('dashboard');
     
    } catch (\Throwable $th) {
        session()->flash('error', 'Invalid Login Details');
        return redirect()->back();
    }
})->name('login');

// FORGET PASSWORD --RESET PASSWORD
Route::get('/password/request', function(){
    return view('password.request');
})->name('userRequest');

Route::post('/password/request', function(Request $request){
    $request->validate([
        'email'=> 'required|email|exists:users,email'
    ]);

    $token = Str::random(64);
    DB::table('password_resets')->insert([
        'email'=> $request->email,
        'token'=>$token,
        'created_at'=> Carbon::now()
    ]);

    $action_link= route('password.reset', ['token'=>$token, 'email'=>$request->email]);
    $body= "We have received a request to reset the password for <b> Mega</b> account associated with
    ".$request->email.". You can reset your password by clicking the link below";

    Mail::send('email_forgot', ['action_link'=>$action_link, 'body'=>$body], function($message) use ($request){
        $message->from('agbesuaoluwatoyin96@gmail.com', 'Mega');
        $message->to($request->email, 'Your name')
                ->subject('Reset Password');
    });
    

    return back()->with('success', 'We have e-mailed your password reset link!');
})->name('send_password');

Route::get('/password/reset/{token}', function(Request $request, $token=null){
    return view('admin.password.reset')->with(['token'=>$token, 'email'=>$request->email]);
})->name('password.reset');

Route::post('/password/reset', function(Request $request){
    $request->validate([
        'email'=>'required|email|exists:users,email',
        'password'=>['required', 'confirmed', Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
        ],
        'password_confirmation'=>'required'
    ]);

    $check_token = DB::table('password_resets')->where([
        'email'=>$request->email,
        'token'=>$request->token,
    ])->first();

    if(!$check_token){
        return back()->withInput()->with('fail', 'Invalid Token');
    }else{
        User::where('email', $request->email)->update([
            'password'=> Hash::make($request->password)
        ]);

        DB::table('password_resets')->where([
            'email'=>$request->email
        ])->delete();
        
        return redirect()->to('login')
        ->with('info', 'Your password has been changed! You can now login with the new password')
        ->with(['verifiedEmail'=>$request->email]);
    }
})->name('resetPassword');

// END FORGET PASSWORD --RESET PASSWORD

// ADMIN LOGOUT
Route::get('/logout', function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('login')
    ->with('log', "You've successfully logout! Enter your details to login");
})->name('logout');




// DASHBOARD
Route::get('/dashboard', function(){
    $validateUser =Auth::user()->id;
    
  
    try {
        if($validateUser){
            $a = auth()->user()->firstName;
            $b = auth()->user()->lastName;
            $first= substr($a,0,1);
            $sec= substr($b,0,1);
            return view('dashboard')->with(['first'=>$first, 'second'=>$sec]);
        }
    } catch (\Throwable $th) {
        return "You are yet to be a validated user, please signup first";
    }
    
})->name('dashboard');


// BLOG
Route::get('/blog', function(){
    return view('blog');
});
Route::post('/blog', function(Request $request){
    $validateUser = auth()->user()->id;
    
    try {
        if(!$validateUser){
            session()->flash('error', 'Please signup first');
            return redirect()->route('signup');
        }else{
            $request->validate([
                'title'=>'required',
                'blog'=>'required'
            ]);
        
            // $removeContentElement= remove_html_tags($request->blog, array("span","b",'i'));
            $blog= DB::table('blogs')->insert([
                'title'=>$request->title,
                'content'=>$request->blog,
                'user_id'=>$validateUser,
                'time'=>now(),
                'view'=>0,
                'image'=>0
            ]); 
            
            session()->flash('success', 'Blog posted successfully');
            return redirect()->back();
        }
        
    }catch (\Throwable $th) {
        session()->flash('error', 'ERROR');
        return redirect()->back();
    }
})->name('blog');

// UPLOAD BLOG IMAGE
Route::post('/post', function(Request $req){
    $validateBlog = Blog::get('id');
    dd($validateBlog);
    $data = Blog::find($validateBlog);
    $req->validate([
        'image'=>'required|image|mimes:png,jpg,jpeg|max:5048'
    ]);
    
    try { 
        $image = $req->image;
    
        if($image !== null){
            $gen= mt_rand(10000, 90000);
            $ext= $req->image->extension();
            $path= $gen . ".". $ext;
            $show= $req->image->move(public_path('images'), $path);
            

            $display = DB::table('users')
                    ->where('id', $validateBlog)
                    ->update([
                        'email'=>$data->email,
                        'password'=>Hash::make($data->password),
                        "firstName"=>$data->firstName,
                        "lastName"=>$data->lastName,
                        "phoneNumber"=>$data->phoneNumber,
                        'image'=>$path,
                        'updated_at'=>now()
            ]);
        }
        session()->flash('success', 'Blog posted successfully');
        return redirect()->back();
    }catch (\Throwable $th) {
        session()->flash('error', 'ERROR');
        return redirect()->back();
    }
})->name('blogImage');

//NAVBAR

Route::get('/nav', function(){
    return view('include.nav');
});


// BLOG POST
Route::get('/blog_post', function(Request $request){
    $blogs = DB::table('blogs')->get();
    
    $show = DB::table('users')->get();
    
    return view('blog_post')->with(['blogs'=>$blogs, 'show'=>$show]);
});


// SINGLE BLOG POST
Route::get('/single_post', function(Request $request){
    
    $id = $request->blog_id;
    
    $show = Blog::where('id',$id)->max('view')+1;
    
    Blog::where('id', $id)->update([
        'view'=> $show
    ]);
    $blogs = DB::table('blogs')
            ->where('id', $id)
            ->get();
    
    return view('single_post')->with(['blog'=>$blogs]);
});

// EDIT BLOG POST
Route::get('/edit_blog', function(Request $request){
    $validateUser = auth()->user()->id;
    
    $check = Blog::where('user_id', $validateUser)->get();
    
    return view('edit_blog')->with(['check'=>$check]);
});


// DELETE CONTESTANT FORM
Route::post('delete-blog/{id}', function(Request $request, $id){
    try {
         $blog = DB::table('blogs')
         ->where('id',$id)            
         ->delete();

         echo session()->flash('success', 'Blog details deleted successfully');
         return redirect('edit_blog');
    } catch (\Throwable $th) {
        return "error";
    }
 })->name('delete-blog');

// UPDATE BLOG
Route::get('/update/{id}', function(Request $request, $id){
    $id;
    $check = Blog::where('id', $id)->get();
    foreach ($check as $i) {
        $i;
    }
    
    return view('update')->with(['data'=>$i]);
});
Route::post('/update', function(Request $request){
    $data= Blog::find($request->id);
    $validateUser = auth()->user()->id;
    
    $data->title=$request->title;
    $data->content=$request->blog;
    $data->user_id=$validateUser;
    $data->time=now();
    $data->view=0;
    $data->image=0;
    $data->save();

    return redirect('edit_blog');
     
})->name('update');

Route::get('/profile', function(){
    $validateUser = Auth::user()->id;
    $user= User::find($validateUser);

    

    $a = auth()->user()->firstName;
    $b = auth()->user()->lastName;
    $first= substr($a,0,1);
    $sec= substr($b,0,1);
    $check = DB::table('users')
    ->where('id', $validateUser)
    ->get('image');
    
    $img = DB::table('users')
    ->where('id', $validateUser)
    ->get();
    
    return view('profile')->with(['user'=>$user,'first'=>$first, 'second'=>$sec,'uploadedImg'=>$check, 'userImage'=>$img]);
})->name('profile');


Route::post('profile', function(Request $req){
    $validateUser = auth()->user()->id;
    $data = User::find($validateUser);
    
    $req->validate([
        'image'=>"required|image|mimes:png,jpg,jpeg|max:5048"
    ]);
    try {
        $image = $req->image;
    
        if($image !== null){
            $gen= mt_rand(10000, 90000);
            $ext= $req->image->extension();
            $path= $gen . ".". $ext;
            $show= $req->image->move(public_path('images'), $path);
            

            $display = DB::table('users')
                    ->where('id', $validateUser)
                    ->update([
                        'email'=>$data->email,
                        'password'=>Hash::make($data->password),
                        "firstName"=>$data->firstName,
                        "lastName"=>$data->lastName,
                        "phoneNumber"=>$data->phoneNumber,
                        'image'=>$path,
                        'updated_at'=>now()
            ]);
        }
    
        // $check = DB::table('users')
        // ->where('id', $validateUser)
        // ->get('image');

        if($display){
            session()->flash('success', 'Profile picture uploaded successfully');
            return redirect('profile');
        }
    } catch (\Throwable $th) {
        return "error";
    }
});

Route::get('/search/query', [SearchController::class, 'query']);

Route::get('/welcome', function(Request $request){ 
    
    return view('welcome');
});
