<x-app-layout>

  <div class="add_post p-4 ">
    <h4>Add Posts</h4>
    <form action="{{route('updatepost')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" id="" value="{{$post->id}}">
      <div class="">
        <label for="title">Title</label>
        <input type="text" name="title" id="" value="{{$post->title}}">
        @error('title')
            <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="">
        <div class="">
          <label for="title">Add photo</label>
          <input type="file" name="file" id="file" />
        </div>
        @if($post->file)
    <div class="ml-lg-2 text-light" id="">
      <p>Current file:</p>
      <div class="" id="preview" style="display: flex; align-items: center;justify-content:center;">
        <img src="{{ asset('file/' . $post->file) }}" alt="Current Photo" style="max-width: 350px;border-radius:0.5rem;" class="">
      </div>
    </div>
    @endif
      </div>
      
      <div class="">
        <label for="title">Body</label>
        <textarea name="body" id="" cols="30" rows="17">{{$post->body}}</textarea>
        @error('body')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>
      <div class="">
        <button type="submit">Post</button>
      </div>
  
    </form>
  </div>
      
  </x-app-layout>