<x-app-layout>
<div class="welcome"> 
    <div class=" col-lg-10 col-md-10 col-12 mx-auto bg-secondary">
        <div class="d-lg-flex d-md-flex ">
                    <div class="col-lg-6 col-md-6 col-12  p-lg-4 p-md-2 p-col-2 mx-auto">
                        <div class="card p-2 h-100">
                        
                            <div>
                                <h2>{{$post->title}}</h2>
                                <p>{{$post->body}}</p>
                              <p> <small><strong>Posted by:</strong> {{$post->user->name}}</small></p> 
                              <p> <small><strong>Posted at:</strong> {{$post->created_at}}</small></p>
                               
            
                            </div>
                        <div>
                            
                          </div>
                    </div>
             
               
            </div>
         
        
         </div>
        </div>
            </div>


       
    
    
    
    
        </x-app-layout>






   