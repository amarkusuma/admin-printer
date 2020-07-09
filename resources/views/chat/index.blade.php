@extends('dashboard')

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
 @section('content')

 {{-- <div class="row">    --}}
      {{-- <div class="col-sm-9">
         <div class="card">
             <div class="card-block">
        
                 <div class="table-responsive m-t-40">
                     <dw-messages :messages="messages"></dw-messages>
                 </div>
             </div>
            
         </div>
         <dw-form v-on:sent="addMessage" :user="{{ Auth::user() }}"></dw-form>
     </div>
     <user-component></user-component> --}}

     {{-- <chat-private :messages="messages"></chat-private> --}}
     <example></example>
     
 
     {{-- <router-link to="/xample">contoh</router-link> --}}
 {{-- </div> --}}
   
 
 @endsection
 