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
        <!-- You can change the theme colors from here -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- You can change the theme colors from here -->
        <link href="css/colors/blue.css" id="theme" rel="stylesheet">
        
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>

<body class="fix-header card-no-border">

    {{-- {{!empty(Route::currentRouteName()) ? "" : "Show data product"  }} --}}
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
 
                <!-- Row -->
                
                <div class="row">
                    <!-- Column -->
                   
                    <div class="col-lg-5 col-xlg-3 col-md-5">
                        <div class="card ">
                            <div class="card-block">
                                <center class="m-t-8">
                                    <?php 
                                    if ($product->type == 'printer') {
                                       $tampil = "assets/images/MTprint/product/printer/" .$product->image ;
                                    }elseif ($product->type == 'laptop') {
                                        $tampil = "assets/images/MTprint/product/laptop/" .$product->image ;
                                    }elseif ($product->type == 'proyektor') {
                                        $tampil = "assets/images/MTprint/product/proyektor/" .$product->image ;
                                    }elseif ($product->type == 'toner') {
                                        $tampil = "assets/images/MTprint/product/toner/" .$product->image ;
                                    }
                                    ?>
                                     <img src="<?php echo $tampil ?>"  width="260" height="200" />
                                    <h4 class="card-title m-t-10"><?php echo $product->brand ?></h4>
                                    <h6 class="card-subtitle"><?php echo $product->name ?></h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4">
                                            <?php $value = ($product->stock <= 0 ) ?  '<span class="badge badge-warning">Kosong ' :  '<span class="badge badge-info">Ready' ?>
                                            <?php echo $value ?>
                                        </div>
                                       
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-6 col-xlg-9 col-md-8">
                      
                        <div class="card">
                            <div class="card-block">
                                <form class="form-horizontal form-material"  enctype="multipart/form-data">
                                    
                                    <div class="form-group">
                                        <label class="col-md-12">Nama</label>
                                        <div class="col-md-12">
                                            <input type="text"  value="<?php echo $product->name ?>" class="form-control form-control-line" name="name-product">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Merk</label>
                                        <div class="col-md-12">
                                            <input type="text"  value="<?php echo $product->brand ?>" class="form-control form-control-line" name="brand-product" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Harga</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $product->price ?>" name="price-product" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Stock</label>
                                        <div class="col-md-12">
                                            <input type="number" value="<?php echo $product->stock ?>" placeholder="" name="stock-product" class="form-control form-control-line">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">  
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
                                            <a href="{{ route('product') }}" class="btn btn-success">
                                                <i class="fa fa-arrow-left"></i>
                                                back 
                                            </a>
                                            
                                        </div>
                                    </div>
                                </form>
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
