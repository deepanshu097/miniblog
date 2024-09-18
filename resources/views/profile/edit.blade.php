<x-app-layout class="">
    <x-slot name="header">
        <h2 class="text-light">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    {{-- <div class=" ">
        <div class="" style="display:flex;flex-direction:column;">
            <div class="border" > 
              <div class="">
                    @include('profile.partials.update-profile-information-form')
                </div> 
            </div> 

             <div class="">
                <div class="">
                    @include('profile.partials.update-password-form')
                </div>
            </div> 

            <div class="">
                <div class="">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> 
         </div>
    </div> --}}
  

    <div class="text-light" style="display: flex; flex-direction:column;">
        <div class=" p-lg-4 p-sm-2 p-col-2 " style="height: 500px;position:relative;"> 
            @include('profile.partials.update-profile-information-form')
        </div>
        <div class=" p-lg-4 p-sm-2 p-col-2" style="height: 500px;position:relative;">
            @include('profile.partials.update-password-form')
        </div>
        <div class=" p-lg-4 p-sm-2 p-col-2" style="height: 500px;position:relative;">
            @include('profile.partials.delete-user-form')
        </div>
    </div>

</x-app-layout>
