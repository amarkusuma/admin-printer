@extends('dashboard')

 <script src="js/app.js" defer></script>
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
     <example :messages="messages"></example>
 
     {{-- <router-link to="/xample">contoh</router-link> --}}
 {{-- </div> --}}
   
 
 @endsection