<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Scripts -->
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="user-page bg-dark">
            <div class="nav-open-btn " id="nav-open-btn">
                <button type="button" class="openbtn" onclick="open_side()"><svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                  </svg></button>
                  <p class="text-white mr-4">Blog</p>
            </div>
            <div class="side-nav" id="side-nav">
                @include('layouts.nav')
            </div>
          
            <!-- Page Content -->
            <div class="main px-0">
                <main class="">
                    {{ $slot }}
                </main>
            </div>
           
           
        </div>
        <footer class="bg-dark">
            <div class="text-center text-white py-4">
                <p>Designed and created by </p> <span>Deepanshu Yadav</span>
            </div>
        </footer>
    <script>
document.getElementById('file').addEventListener('change', function(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];

    // Clear any previous content
    preview.innerHTML = '';

    // Ensure the file is selected and is an image
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();

        // When the file is loaded, display it
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.maxWidth = '350px'; // Set max width to fit the container
            img.style.height = 'auto';
            img.style.borderRadius='0.5rem';
            // Adjust height automatically
            preview.appendChild(img);
        };

        // Read the file as a data URL
        reader.readAsDataURL(file);
    } else {
        preview.innerHTML = '<p>No image selected or file is not an image.</p>';
    }
});


function open_side(){
var element= document.getElementById('side-nav');
var btn = document.getElementById('nav-open-btn');
var main = document.getElementsByClassName('main')[0];

if(element.style.display=='block'){
    btn.style.display='block'
    element.style.display='none'
    main.style.display='block'
}else{
    element.style.display='block'
    main.style.display='none'
    btn.style.display='none'
}


}

document.addEventListener('DOMContentLoaded', function() {
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl);
        });
    });


    function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}




    </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      
    </body>
</html>
