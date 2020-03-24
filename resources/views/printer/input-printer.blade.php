@extends('dashboard')
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
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

@section('content')
    
<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        
        
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            
                
                <!-- Row -->
                <div class="row">
                   

                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-8">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                        </div>
                       @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if($errors->has('name_printer'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $errors->first('name_printer') }}</strong>
                        </div>
                        @endif
                        @if($errors->has('brand_printer'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $errors->first('brand_printer') }}</strong>
                        </div>
                        @endif
                        @if($errors->has('price_printer'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $errors->first('price_printer') }}</strong>
                        </div>
                        @endif
                        @if($errors->has('image_printer'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $errors->first('image_printer') }}</strong>
                        </div>
                        @endif
                      
                        <div class="card-block">
                        <h4 class="card-title" style="color: #111; font-family: 'Open Sans Condensed', sans-serif; font-size: 24px; font-weight: 700;  margin: 0 0 0; padding: 20px 30px; text-align: center; text-transform: uppercase;">Tambahkan Data Printer</h4>
                       </div>
                        <div class="card">
                            <div class="card-block">
                            <form class="form-horizontal form-material"   action="{{route('input-printer')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Nama</label>
                                        <div class="col-md-12">
                                            <input type="text"  class="form-control form-control-line" name="name_printer">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Merk</label>
                                        <div class="col-md-12">
                                            <input type="text"  class="form-control form-control-line" name="brand_printer" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Harga</label>
                                        <div class="col-md-12">
                                            <input type="text" value="" name="price_printer" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Stock</label>
                                        <div class="col-md-12">
                                            <input type="number" placeholder="" name="stock_printer" class="form-control form-control-line">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">Upload Image</div>
                                       
                                            <div class="col-md-12">
                                                <input class="input-file" type="file" name="image_printer" id="file">
                                               
                                            </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="col-md-12">Message</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line"></textarea>
                                        </div>
                                    </div>
                                     --}}
                                    {{-- <div class="form-group">
                                        <label class="col-sm-12">Select Country</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line">
                                                <option>London</option>
                                                <option>India</option>
                                                <option>Usa</option>
                                                <option>Canada</option>
                                                <option>Thailand</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Save
                                                <i class="fa fa-save"></i>
                                            </button>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            
           
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
  
</body>
@stop
</html>
