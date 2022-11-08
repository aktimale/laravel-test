@extends('layouts.basic')
@section('content')

<form action="{{ route('post.update', $post->id) }}" method="POST">
    @csrf
    @method('patch')
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" name="title" id="title" aria-describedby="titlelHelp" value="{{ $post->title }}">
    <div id="titleHelp" class="form-text">Здесь нужно ввести название статьи</div>
  </div>
  <div class="mb-3">
  <label for="category" class="form-label">Категория</label>
    <select class="form-select" name="category_id" id="category" aria-label="Категория">
      @foreach($categories as $category)
        <option
        {{ $category->id == $post->category_id ? ' selected ' : ''}}
        
        value="{{ $category->id }}">{{ $category->title}}
      </option>  
      @endforeach
    </select>
    <div id="categoryHelp" class="form-text">Здесь нужно выбрать категорию</div>  
  </div>
  <div class="mb-3">  
    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" name="description" id="description" aria-describedby="descriptionHelp" value="{{ $post->description }}">
    <div id="descriptionHelp" class="form-text">Здесь нужно ввести описание статьи</div>
  </div>
  <div class="mb-3">
    <label for="intro_text" class="form-label">Intro text</label>
    <input type="text" class="form-control" name="intro_text" id="intro_text" aria-describedby="intro_textlHelp" value="{{ $post->intro_text }}">
    <div id="intro_textHelp" class="form-text">Здесь нужно ввести вводный текст</div>
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea rows="4" cols="50" class="form-control" name="content" id="content" aria-describedby="contentHelp">{{ $post->content }}</textarea>
    <div id="contentHelp" class="form-text">Здесь нужно ввести текст</div>
  </div>
  <div class="mb-3">
    <label for="tags" class="form-label" class="form-control">Tags</label>
      <select class="form-select" multiple aria-label="multiple select example" name="tags[]" id="tags">
        @foreach ($tags as $tag) 
          <option 
            @foreach($post->tags as $postTag) 
              {{ $tag->id === $postTag->id ? ' selected ' : '' }}
            @endforeach
          value="{{ $tag->id }}">{{ $tag->title }}</option>  
        @endforeach
    </select>
    <div id="tagsHelp" class="form-text">Здесь нужно выбрать тэги</div>
  </div>
  
  <button type="submit" class="btn btn-primary">Update</button>
</form>
   
@endsection