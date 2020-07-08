<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
Use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public function index(){

        // $posts = Post::all();
        $posts = auth()->user()->posts()->paginate(5); //use posts as a property (no ()) to return a collection

        return view('admin.posts.index',['posts'=>$posts]);

    }


    public function show(Post $post){ //injected a class, and will match whatever parameter is passed
        
        return view('/blog-post', ['post'=>$post]);
    }

    public function create(){

        return view('admin.posts.create');

    }

    public function store(){
        
        $inputs = request()->validate([
                        'title'=>'required|min:8|max:255',
                        'post_image'=>'file',
                        'body'=>'required'
                    ]);


        //if image exists, save image to request key for images
        if(request('post_image')){
            $inputs['post_image']=request('post_image')->store('images'); //store method saves to directory
        }

        auth()->user()->posts()->create($inputs);

        session()->flash('successMessage','Post was created successfully.'); // saves a message in flash data for one time only

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post){
        $post->delete();
        Session::flash('message','Post was deleted successfully.'); // saves a message in flash data for one time only
        return back();
    
    
    }


    public function edit(Post $post){

        // $this->authorize('view', $post);

        if(auth()->user()->can('view',$post)){
            
        }
        
        return view('admin.posts.edit', ['post'=>$post]);

    }

    public function update(Post $post){

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);



        if(request('post_image')){
            $inputs['post_image']=request('post_image')->store('images'); //store method saves to directory
            $post->post_image=$inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $this->authorize('update',$post); //only allow authorised users to edit or update. must pass in a model.

        // $post->save();
        $post->update();

        session()->flash('updatedMessage','Post was updated successfully.');

        return redirect()->route('posts.index');

    }
    
}
