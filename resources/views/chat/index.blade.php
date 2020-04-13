@extends('dashboard')

 <script src="js/app.js" defer></script>

@section('content')

    <div class="col-sm-9">
        <div class="card">
            <div class="card-block">
                {{-- <select class="custom-select pull-right">
                    <option selected>January</option>
                    <option value="1">February</option>
                    <option value="2">March</option>
                    <option value="3">April</option>
                </select> --}}
                {{-- <h5 class="card-title">From Chating</h5> --}}
                <div class="table-responsive m-t-40">
                    <dw-messages :messages="messages"></dw-messages>
                </div>
            </div>
           
        </div>
        <dw-form v-on:sent="addMessage" :user="{{ Auth::user() }}"></dw-form>

    </div>
    <user-component></user-component>

    {{-- <router-link to="/xample">contoh</router-link> --}}

    <router-view></router-view>

@endsection