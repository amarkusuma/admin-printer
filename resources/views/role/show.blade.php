
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
                            <h4 class="card-title" style="color: #111; font-family: 'Open Sans Condensed', sans-serif; font-size: 24px; font-weight: 700;  margin: 0 0 0; padding: 20px 30px; text-align: center; text-transform: uppercase;">Show Role</h4>
                           </div>
                        <div class="card">
                            <div class="card-block">
                            <form class="form-horizontal form-material"  method="POST" action=""   enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label class="col-sm-12">Nama Role : </label>
                                        <div class="col-sm-12">
                                            <div class="col-md-12">
                                                <input type="text"  class="form-control form-control-line" name="name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">keterangan</label>
                                        <div class="col-md-12">
                                            <textarea rows="4" name="keterangan" class="form-control form-control-line"></textarea>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                     <label class="col-sm-12">Permission : </label>
                                     <div class="col-md-12">
                                        <div class="form-checkbox">
                                            <input type="checkbox" id="html">
                                            <label for="html">Create</label>
                                          </div>
                                          <div class="form-checkbox">
                                            <input type="checkbox" id="css">
                                            <label for="css">Update</label>
                                          </div>
                                          <div class="form-checkbox">
                                            <input type="checkbox" id="javascript">
                                            <label for="javascript">Delete</label>
                                          </div>
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

<style>
    *, *:before, *:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}


.new {
  padding: 50px;
}

.form-checkbox {
  display: block;
  margin-bottom: 15px;
}

.form-checkbox input {
  padding: 0;
  height: initial;
  width: initial;
  margin-bottom: 0;
  display: none;
  cursor: pointer;
}

.form-checkbox label {
  position: relative;
  cursor: pointer;
}

.form-checkbox label:before {
  content:'';
  -webkit-appearance: none;
  background-color: transparent;
  border: 2px solid #0079bf;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
  padding: 10px;
  display: inline-block;
  position: relative;
  vertical-align: middle;
  cursor: pointer;
  margin-right: 5px;
}

.form-checkbox input:checked + label:after {
  content: '';
  display: block;
  position: absolute;
  top: 2px;
  left: 9px;
  width: 6px;
  height: 14px;
  border: solid #0079bf;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
}
</style>