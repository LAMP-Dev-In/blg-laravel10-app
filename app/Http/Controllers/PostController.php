<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index() : View {

        //dd(Gate::allows('admin'));
        //dd(request()->user()->cannot('admin'));
       //$this->authorize('admin');

        return view('posts.index',[
            'posts' => Post::latest()->filter(
                            request(['search', 'category', 'author'])
                        )->paginate(6)->withQueryString()
         ]);

    }

    public function show(Post $post) : View {
        return view('posts.show', [
            'post' => $post
        ]);   
    }

}
