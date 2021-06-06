<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request,Response,Redirect;
use App\Models\User;
use App\Models\Post;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //dd($request->all());
        if($request->input('search') == 'search')
        {
        $search_text = $request->input('name');

        $posts = DB::table('users')
                ->join('posts','posts.user_id', '=' , 'users.id')
                ->select(['users.name as username','posts.id','posts.name','posts.image','posts.follow'])
                ->where('users.name',$search_text)
                ->get();
                //dd($posts);
        }
        else{
           
            $posts = DB::table('users')
                ->join('posts','posts.user_id', '=' , 'users.id')
                ->select(['users.name as username','posts.id','posts.name','posts.image','posts.follow'])
                
                ->get();
        }
        
        return view('home',compact('posts'));
    }
    public function createPost()
    {
        return view('post');
    }
    public function savePost(Request $request)
    {
       // dd($request->all());
        


            $file = $request->file('image');
            if(!empty($file)){
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $destinationPath = public_path('images');
            $file->move($destinationPath, $filename);
        }
        $date = date('d-m-y h:i:s');
        
       
        $post = new Post();
        $post->name = $request->name;
        $post->image = $filename;
        $post->user_id = Auth::user()->id;
        $post->added_date = $date;
        $post->save();
        return redirect('home')->with(['status' => 'success', 'msg' => 'your post added succesfully']);

    }
    public function status(Request $request,$type,$id)
    {
        //dd($type);
        $post = Post::findOrFail($id);
        $post->follow = $type;
        $post->save();
        return back();

    }
}
