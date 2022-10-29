<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('published', 1)->get();
        foreach ($posts as $post) {
            dump($post->title);
        }
    }

    public function create(){
        $postsArr = [
            [
                'pagetitle' => 'Видимо еще пост',
                'longtitle' => 'Длинный заголовок статьи',
                'description' => 'Описание статьи',
                'introtext' => 'Вводный текст',
                'content' => 'Это текст пока о нативной терминологии',
                'published' => 1,
                'publishedon' => 1,
                'publishedby' => 1,
            ],
            [
                'pagetitle' => 'Пост про пост',
                'longtitle' => 'Длинный заголовок очередной статьи',
                'description' => '',
                'introtext' => '',
                'content' => 'Это текст пока пока',
                'published' => 0,
                'publishedon' => 1,
                'publishedby' => 1,
            ]
        ];

        foreach ($postsArr as $item) {
            Post::create($item);
        }

        dd('created');
    }

    public function update(){
        $post = Post::find(4);
        $post->update([
            'pagetitle' => 'Новый заголовок',
            'longtitle' => 'Длинный заголовок',
            // 'description' => 'Добавили дескриптион',
            // 'introtext' => 'И еще интро',
            // 'content' => '',
            // 'publishedon' => 0,
        ]);

        dd('updated');
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
            'pagetitle' => 'Видимо еще пост',
            'longtitle' => 'Длинный заголовок статьи',
            'description' => 'Описание статьи',
            'introtext' => 'Вводный текст',
            'content' => 'Это текст пока о нативной терминологии',
            'published' => 1,
            'publishedon' => 1,
            'publishedby' => 1,    
        ];

        $post = Post::firstOrCreate(
            [
                'pagetitle' => 'Новейший пост',
            ],
            [
                'pagetitle' => 'Новейший пост',
                'longtitle' => 'Длинный заголовок статьи',
                'description' => 'Описание статьи',
                'introtext' => 'Вводный текст',
                'content' => 'Это текст пока о нативной терминологии',
                'published' => 1,
                'publishedon' => 1,
                'publishedby' => 1, 
            ]
        );
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate(){
        $post = Post::updateOrCreate(
            [
                'pagetitle' => 'Новейший пост свежая версия',
            ],
            [
                'pagetitle' => 'Новейший пост свежая версия',
                'longtitle' => 'Длинный заголовок статьи',
                'description' => 'Описание статьи',
                'introtext' => 'Вводный текст',
                'content' => 'Апгрейд контента',
                'published' => 1,
                'publishedon' => 1,
                'publishedby' => 1, 
            ]
        );
        dump($post->content);
        dd('finished');
    }
}
