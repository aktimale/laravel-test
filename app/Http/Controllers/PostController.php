<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\PostTag;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('post.index', compact('posts'));
        // $category = Category::find(2);
        // $post = Post::find(1);
        // $tag = Tag::find(1);
        // dd($tag->posts);
        // $posts = Post::where('published', 1)->get();
        
    }

    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories','tags'));
    }

    public function store(){
        $data = request()->validate([
            'title'=>'string',
            'description'=>'string',
            'intro_text'=>'string',
            'content'=>'string',
            'category_id'=>'',
            'tags'=>'',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        // foreach ($tags as $tag) {
        //     PostTag::firstOrCreate([
        //         'tag_id'=> $tag,
        //         'post_id'=>$post->id,
        //     ]);
        // }
        $post->tags()->attach($tags);
        return redirect()->route('post.index');
    }

    public function show(Post $post){
        return view('post.show', compact('post'));
    }

    public function edit(Post $post){
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post','categories','tags'));
    }

    public function update(Post $post){
        $data = request()->validate([
            'title'=>'string',
            'description'=>'string',
            'intro_text'=>'string',
            'content'=>'string',
            'category_id'=>'',
            'tags'=>'',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }

    public function delete(){
        $post = Post::find(2);
        $post->delete();
        dd('deleted');
    }

    public function restore(){
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('restored');
    }

    public function firstOrCreate(){

        $anotherPost = [
            'title' => 'Видимо еще пост',
            'description' => 'Описание статьи',
            'intro_text' => 'Вводный текст',
            'content' => 'Это текст пока о нативной терминологии',
            'published' => 1,
            'published_on' => 1,
            'pub_date' => 1,
            'unpub_date' => 1,    
        ];

        $post = Post::firstOrCreate(
            [
                'title' => 'Новейший пост',
            ],
            [
                'title' => 'Новейший пост',
                'description' => 'Описание статьи',
                'intro_text' => 'Вводный текст',
                'content' => 'Это текст пока о нативной терминологии',
                'published' => 1,
                'published_on' => 1,
                'pub_date' => 1,
                'unpub_date' => 1, 
            ]
        );
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate(){
        $post = Post::updateOrCreate(
            [
                'title' => 'Новейший пост свежая версия',
            ],
            [
                'title' => 'Новейший пост свежая версия',
                'description' => 'Описание статьи',
                'intro_text' => 'Вводный текст',
                'content' => 'Апгрейд контента',
                'published' => 1,
                'published_on' => 1,
                'pub_date' => 1,
                'unpub_date' => 1, 
            ]
        );
        dump($post->content);
        dd('finished');
    }
}
