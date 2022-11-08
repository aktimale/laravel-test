@extends('layouts.basic')
@section('content')

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Intro Text</th>
        <th scope="col">Content</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($posts as $post)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></td>
            <td>{{ $post->description }}</td>
            <td>{{ $post->intro_text }}</td>
            <td>{{ $post->content }}</td>
            <td>
            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-link">Редактировать</a>
                <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                @csrf
                @method('delete')
                    <input type="submit" value="Удалить" onclick="return confirm('Удалить запись?')" class="btn btn-link">
                </form>
                
            </td>
            </tr>    
        @endforeach
        
        <tr>
    </tbody>
</table>
            
@endsection