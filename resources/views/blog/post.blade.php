<x-app-layout>
 {{--alert for new post created  --}}
@if (session()->has('status'))
    <div class="alert alert-success text-center" role="alert">
      <p>{{session('status')}}</p>

    </div>
@endif
<div class="add_post p-4 ">
  <h4>Add Posts</h4>
  <form action="{{route('postblog')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="">
      <label for="title">Title</label>
      <input type="text" name="title" id="" value="{{ old('title') }}">
      @error('title')
          <p class="text-danger">{{$message}}</p>
      @enderror
    </div>
    <div class="">
      <label for="title">Add photo</label>
      <input type="file" name="file" id=""/>
    </div>
    <div class="">
      <label for="title">Body</label>
      <textarea name="body" id="" cols="30" rows="10" value="">{{ old('title') }}</textarea>
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