{{-- @extends('dashboard') --}}
{{-- @section('content') --}}
    <div class="card">
      <div class='card-banner'>
        
        <div class='flag'><span>Featured</span></div>

        <img viewBox="0 0 100 100" src="{{ asset("assets/images/profile/".$user->image)}}" />

        <div class='card-banner--overlay'></div>
      </div>
      <div class='card-bodi'>
      <h2 class='name'>{{$user->name}}</h2>
        
        <div class='description'>

           <span>
              <label for="name">Username</label>
             <input type="text"   id="name" autocomplete="off" value="{{$user->name}}"  />

              <label for="email">Email</label>
              <input type="text" id="email"    autocomplete="off" value="{{$user->email}}" />

              <label for="no">No</label>
              <input type="number" id="no"   autocomplete="off" value="{{$user->no_telfon}}" />

            <label for="alamat">alamat</label>
           <textarea  id="alamat"  rows="2"> {{$user->name}}</textarea>

           </span>
         
        </div>
        
      </div>
    </div>
    {{-- @endsection --}}

<style>

 @import url(https://fonts.googleapis.com/css?family=Lily+Script+One);

.card {
  background: #fff;
  border: 1px solid #ccc;
  border-radius: 1rem;
  box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.1);
  width: 30rem;
  height: 44rem;
  display: flex;
  flex-direction: column;
  overflow: hidden;
  margin:10% auto 0 auto;
  margin-top:2%;
  
  
}
.card .card-banner {
  width: 100%;
  height: 12rem;
  background-image: url(https://www.publicdomainpictures.net/pictures/200000/velka/forest-background.jpg);
  background-image: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.card .card-banner .card-banner--overlay {
  height: 5rem;
  width: 100%;
  border-top-left-radius: 50%;
  border-top-right-radius: 50%;
  position: relative;
  background-color: #ffffff;
  right: 0;
  bottom: 3rem;
  z-index: 1;
}
.card .card-banner .flag {
  width: 35%;
  height: 2rem;
  background: #808000;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #ffffff;
  border-bottom-right-radius: .5rem;
  -webkit-box-shadow: 10px 10px 16px -5px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 10px 10px 16px -5px rgba(0, 0, 0, 0.75);
  box-shadow: 10px 10px 16px -5px rgba(0, 0, 0, 0.75);
}
.card .card-banner img {
  background-color: #ffffff;
  width: 8rem;
  height: 8rem;
  margin-left:20%;
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
  border-radius: 50%;
  transform: translate(60%);
  position: relative;
  z-index: 2;
}
.card .card-bodi {
  display: flex;
  flex-direction: column;
  
  padding: .5rem;
  padding-bottom: 1.5rem;
}
.card .card-bodi .name, .card .card-bodi .title {
  margin: 0 auto;
}
.card .card-bodi .name {
  margin-top:-15px;
}
.card .card-bodi .title {
  color: #228B22;
}
.card .card-bodi .button-row {
  width: 100%;
  height: 2rem;
  padding: .5rem 0;
  display: flex;
  flex-direction: row;
  justify-content: center;
}
.card .card-bodi .button-row .social-button {
  border-radius: 50%;
  background-color: #ffffff;
  width: 2rem;
  height: 2rem;
  outline: 0;
  cursor: pointer;
  filter: drop-shadow(0 3px 12px rgba(0, 0, 0, 0.05));
  transform: scale(1);
  transition: all .1s ease-in;
  z-index: 1;
  pointer-events: visible;
  margin-right: 1rem;
  margin-left: 1rem;
  display: flex;
  justify-content: center;
  align-items: center;
}
.card .card-bodi .button-row .social-button--like {
  border: 1px solid #d92d4f;
  color: #d92d4f;
}
.card .card-bodi .button-row .social-button--like:hover {
  animation: pulseLike 2s infinite;
}
.card .card-bodi .button-row .social-button--trade {
  border: 1px solid #3b5998;
  color: #3b5998;
}
.card .card-bodi .button-row .social-button--trade:hover {
  animation: pulseTrade 2s infinite;
}
.card .card-bodi .description {
  width: 100%;
}


@keyframes pulseLike {
  0% {
    box-shadow: 0 0 0 0px rgba(217, 45, 79, 0.5);
  }
  100% {
    box-shadow: 0 0 4px 10px rgba(0, 0, 0, 0);
  }
}
@keyframes pulseTrade {
  0% {
    box-shadow: 0 0 0 0px rgba(59, 89, 152, 0.5);
  }
  100% {
    box-shadow: 0 0 4px 10px rgba(0, 0, 0, 0);
  }
}

.card .card-bodi .description span{
  
	font-family:arial,tahoma,sans-serif;
	font-size:12px;
	font-weight:normal;
	direction:ltr;
  background:white;
}
.card .card-bodi .description label {
	font-size:14px;
  margin-left:8%;
	color:darkgray;
	cursor:pointer;
  padding-top:8px;
}

.card .card-bodi .description label,
.card .card-bodi .description input , textarea {
	float:left;
	clear:both;
}

.card .card-bodi .description input ,textarea {
	margin:10px auto;
	padding:12px 13px;
	width:83%;
  margin-left:8%;
  margin-right:9%;
	outline:none;
	border:1px solid #bbb;
	border-radius:20px;
	display:inline-block;
	-webkit-box-sizing:border-box;
	   -moz-box-sizing:border-box;
	        box-sizing:border-box;
    -webkit-transition:0.2s ease all;
	   -moz-transition:0.2s ease all;
	    -ms-transition:0.2s ease all;
	     -o-transition:0.2s ease all;
	        transition:0.2s ease all;

}

.card .card-bodi .description input[type=text]:focus, 
.card .card-bodi .description input[type=number]:focus,
.card .card-bodi .description textarea:focus,
.card .card-bodi .description input[type="password"]:focus {
	border-color:cornflowerblue;
}

@font-face {
  font-family: 'password';
  font-style: normal;
  font-weight: 400;
  src: url(https://jsbin-user-assets.s3.amazonaws.com/rafaelcastrocouto/password.ttf);
}

input.key {
  font-family: 'password';
  
}

.card .card-bodi .description input[type=submit] {
	padding:10px 40px;
	width:auto;
  margin-right:10%;
	background:#1abc9c;
	border:none;
	color:white;
	cursor:pointer;
	display:inline-block;
	float:right;
	clear:right;
	-webkit-transition:0.2s ease all;
	   -moz-transition:0.2s ease all;
	    -ms-transition:0.2s ease all;
	     -o-transition:0.2s ease all;
	        transition:0.2s ease all;
}

.card .card-bodi .description input[type=submit]:hover {
	opacity:0.8;
}

.card .card-bodi .description input[type="submit"]:active {
	opacity:0.4;
}

</style>