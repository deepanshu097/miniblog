<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\PostSubmitted;
use Illuminate\Support\Facades\Mail;
use League\CommonMark\Extension\CommonMark\Node\Inline\Image;
use App\Http\Controllers\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('blog.post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
       // Assuming user is authenticated
       $user = $request->user();
        $post = new Post();
        $post->title= $request->title;
        $post->body=$request->body;
        if ($request->file('file')) {
            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('file'), $imageName);
            $post->file = $imageName;
        }
        $user->post()->save($post);
        $user = auth()->user();

          // Mail::to($user)->send(new PostSubmitted());
        return back()->with('status', 'post uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('blog.editpost',['post'=>$post]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
            'id' => 'required|string'
        ]);

        $post = Post::findOrFail($validated['id']);

        // Update the post's title and body
        $post->title = $validated['title'];
        $post->body = $validated['body'];
    
        // Handle the file upload if a file is uploaded
        if ($request->hasFile('file')) {
            // Store the file in the 'uploads' directory in public storage
            // $filePath = $request->file('file')->store('file', 'public');
            $filename = time().rand(0,999).'.'.$request->file->extension();
            $request->file->move(public_path('file'),  $filename);
    
            // Optionally, you can delete the old file from storage
            if ($post->file && file_exists(public_path('file/'.$post->file))) {
                unlink(public_path('file/'.$post->file));
                // Storage::disk('public')->delete($post->file);
            }
    
            // Update the post's file path
            $post->file =  $filename;
        }
    
        // Save the updated post
        $post->save();
// dd($post->file);
    
        // Redirect back to the dashboard with a success message
        return redirect('dashboard')->with('status', 'Blog is updated');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Request $request, $id)
    {
       
        $post = Post::findOrFail($id);
        if ($post->file && file_exists(public_path('file/'.$post->file))) {
            unlink(public_path('file/'.$post->file));
            // Storage::disk('public')->delete($post->file);
        }
      
        Post::destroy($id);
        return redirect('dashboard')->with('status',' post deleted');
    }
}
