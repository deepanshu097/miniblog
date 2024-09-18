<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-500 leading-tight bg-light p-3 rounded my-0">
        {{ __('Dashboard') }}
    </h2>
</x-slot>   
@if(session()->has('status'))
<div class="alert alert-info text-center" role="alert">
   {{session('status')}}
  </div>
    
@endif



  @if (count($posts)==0)
  <div class="text-light text-center d-flex  flex-column justify-content-center " style="height: 100vh;" >
    <h4 class="mh-100">
      No post yet
    </h4>
    <a href="{{route('add_post')}}" class="">Create post</a>
  </div>
      
  @else
  @foreach ($posts as $post)
  <div class="post text-light p-2 d-flex">
    <div class="user-logo mx-1 py-1">
      <a href="#" class="icon p-1 "><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle " viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
      </svg></a>
    </div>
    <div class="post-content">

      <div class="post-header ">
        <div class="left">
          <a href="#" class="text-light user-name">
           {{$post->user->name}}</a>
           <a href=""><span>@</span>{{$post->user->email}} ‧</a>
          <a href="javascript:void(0)" class="post-date">{{$date =$post->created_at->format('d M y')}}</a>
        </div>
        @if(Auth::check())
        <div class="right">
  <div class="dropdown dropleft">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    
  </a>

  <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink" style="height: 100px;color:gray;">

    <form action="{{ route('editpost', $post->id) }}" method="GET" class="d-block">
      @csrf
      @method('GET')
      <button type="submit" class="dropdown-item" style="color:gray;width:100%; align-item:center;">edit Post</button>
  </form>
   {{--- <a href="{{ route('editpost', $post->id) }}" class="">edit post</a> --}}
   <form action="{{ route('deletepost', $post->id) }}" method="POST" class="my-4 d-block" >
      @csrf
      @method('DELETE')
      <button type="submit" class="dropdown-item" style="color:gray;">Delete Post</button>
  </form>
  </div>
</div>  





</div>
@endif



    </div>

    
    <div class="post-body px-2">
      <div>
        <p>{{$post->title}}</p>
        <p>{{$post->body}}</p>
      </div>
      @if ($post->file)
          <div class="post-img">
            <img src="{{asset('file/'.$post->file)}}" alt="pic">
          </div>
      @endif
    </div>
  </div>
  </div>
  @endforeach
  @endif
</div>



</x-app-layout>
