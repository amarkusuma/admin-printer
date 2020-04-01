
<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
        <title>MT Print</title>
       
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/checkbox.css" rel="stylesheet">
        <!-- You can change the theme colors from here -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- You can change the theme colors from here -->
        <link href="css/colors/blue.css" id="theme" rel="stylesheet">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    </head>

<body class="fix-header card-no-border">

    {{-- {{!empty(Route::currentRouteName()) ? "" : "Show data Printer"  }} --}}
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
 
                <!-- Row -->
         <div id="main-wrapper">
        
        
              <div class="page-wrapper">
                <div class="row">
                    <!-- Column -->
                   
  
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-8">
                        <div class="card-block">
                            <h4 class="card-title" style="color: #111; font-family: 'Open Sans Condensed', sans-serif; font-size: 24px; font-weight: 700;  margin: 0 0 0; padding: 20px 30px; text-align: center; text-transform: uppercase;">Edit Permission</h4>
                           </div>
                        <div class="card">
                            <div class="card-block">
                            <form class="form-horizontal form-material"  method="POST" action="{{route('role-update', $role->id)}}"   enctype="multipart/form-data">
                                    @csrf
                                
                                    {{-- <div class="form-group">
                                        <label class="col-sm-12">Role User : </label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line"  name="roles[]">
                                                <option value="">-- Pilih Role --</option>
                                              
                                                @foreach($roles as $rows)
                                                    <option value="{{$rows}}" >{{$rows}}</option>
                                                @endforeach
                                            </select>
                                           
                                        </div>
                                    </div> --}}
                                    {{-- <div class="form-group">
                                        <label class="col-md-12">Nama : </label>
                                        <div class="col-md-12">
                                            <input type="text"   class="form-control form-control-line" name="role_name">
                                        </div>
                                    </div> --}}

                                    <div class="form-group">
                                        <label class="col-sm-12">Nama Role : </label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line"  name="role_name[]">
                                                    <option  >{{$role->name}}</option>
                                            </select>
                                            {{-- {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!} --}}
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="col-sm-12">Permission : </label>
                                        <div class="col-sm-12">
                                   
                                             @foreach($permission as $value)
                                               <div class="myForm1">
                                               {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'myForm1', 'id'=>"checkbox$value->id")) }}
                                                <label for="<?php echo "checkbox$value->id" ?>"> {{ $value->name }}</label>
                                               </div>
                                            
                                            @endforeach
                                                                            
                                        </div>
                                    </div>

                                    

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button  name="update" class="update btn btn-success " data-id="">Save
                                                <i class="fa fa-save"></i>
                                            </button>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
  
                {{-- <script src="assets/plugins/jquery/jquery.min.js"></script>
                <!-- Bootstrap tether Core JavaScript -->
                <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
                <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
                <!-- slimscrollbar scrollbar JavaScript -->
                <script src="js/jquery.slimscroll.js"></script>
                <!--Wave Effects -->
                <script src="js/waves.js"></script>
                <!--Menu sidebar -->
                <script src="js/sidebarmenu.js"></script>
                <!--stickey kit --> --}}
               
               
                <script src="js/custom.min.js"></script>
                
                <script src="assets/plugins/flot/jquery.flot.js"></script>
                <script src="assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
                <script src="js/flot-data.js"></script>
                <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

                <script src="js/waves.js"></script>
                <!--Menu sidebar -->
                <script src="js/sidebarmenu.js"></script>
               
                <script src="js/custom.min.js"></script>
                
              
   

                
                
</body>

</html>

