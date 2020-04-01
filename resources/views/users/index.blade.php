@extends('dashboard')
<!DOCTYPE html>

<html lang="en">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link  href="https://cdn.bootcss.com/datatables/1.10.19/css/dataTables.bootstrap4.css" rel="stylesheet">

<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- You can change the theme colors from here -->
<link href="css/colors/blue.css" id="theme" rel="stylesheet">

<!-- You can change the theme colors from here -->
<link href="css/colors/blue.css" id="theme" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}


   <script>
   
   $(document).ready( function () {
     
    $('#laravel_datatable').DataTable({
           processing: true,
           serverSide: true,
         //   "sScrollX": "100%",
         //   "sScrollXInner": "103%",
         //   "sScrollY": "100%",
         //   "sScrollYInner": "110%",
           ajax: "{{ route('dataTable.user') }}",
         
           columns: [
                    { data: 'DT_RowIndex', name:'id'},
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'role' },
                    { data: 'action',name: 'action', orderable: false ,searchable: false},
                 ],
                 
               //   "dom": 'Bfrtip',
               //   "buttons": [ 'copy', 'csv', 'excel', 'pdf', 'print' ]  
               
        });


//          $('body').on('click', '.delete', function () {
//          var product_id = $(this).attr("data-id");
//          var alert = confirm("Apakah Kamu yakin Ingin Menghapus ini  !");
//          if (alert) {
//              $(this).closest('tr').remove();
           
//             } else{
//             return false;
//          }
//          $.ajaxSetup({
//                headers: {
//                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                }
//             });
//          $.ajax({
//                type: "DELETE",
//                url: "printer.delete/"+product_id,
//                data: "id="+product_id,
               
//                success: function (data) {
//                   console.log('Succes:', data);
      
//                },
//                error: function (data) {
//                   console.log('Error:', data);
//                }
//          });
//    });

//    $('body').on('click', '.show', function () {
//          var product_id = $(this).attr("data-id");
//          // confirm("Are You sure want to delete !");
//          // $(this).closest('tr').remove();
//          $.ajaxSetup({
//                headers: {
//                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                }
//             });
//          $.ajax({
//                type: "POST",
//                url: "printer.show/"+ product_id,
//                data: "id="+product_id,
               
//                success: function (data) {
//                   // console.log('Succes:', data);
//                   $('.container').html(data);	
//                   // window.location = "printer.show/"+product_id;
//                },
//                error: function (data) {
//                   console.log('Error:', data);
//                }
//          });
//    });
   $('body').on('click', '.edit', function () {
         var user_id = $(this).attr("data-id");
         // confirm("Are You sure want to delete !");
         // $(this).closest('tr').remove();
         $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });
         $.ajax({
               type: "POST",
               url: "user.role/"+ user_id,
               data: "id="+user_id,
               
               success: function (data) {
                  // console.log('Succes:', data);
                  $('.container').html(data);	
                  // window.location = "printer.show/"+product_id;
               },
               error: function (data) {
                  console.log('Error:', data);
               }
         });
   });
   
   // $('body').on('click', '.update', function () {
   //       var product_id = $(this).attr("data-id");
   //       // confirm("Are You sure want to delete !");
   //       // $(this).closest('tr').remove();
   //       $.ajaxSetup({
   //             headers: {
   //                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   //             }
   //          });
   //       $.ajax({
   //             type: "POST",
   //             url: "printer.update/"+ product_id,
   //             data: "id="+product_id,
               
   //             success: function (data) {
   //                // console.log('Succes:', data);
   //                $('.container').html(data);	
   //                // window.location = "printer.show/"+product_id;
   //             },
   //             error: function (data) {
   //                console.log('Error:', data);
   //             }
   //       });
   // });
   
   
});

  </script>

</head>

@section('content')
      <body>
        
         <div class="container">
           
           {{-- <div class="container-fluid">
               <div class="row">
                  <a href="{{ route('input-printer') }}" class="btn btn-info ml-auto" id="createPrinter">
                     <i class="fa fa-plus"></i>
                     Add User</a>
               </div>
           </div> --}}
           
            <table class="table table-bordered" id="laravel_datatable">
               <thead>
                  <tr >
                     <th>Id</th>
                     <th>Nama</th>
                     <th>Email</th>
                     <th><center>Role</center></th>
                     <th>Action</th>
                     
                  </tr>
               </thead>
            </table>
         </div>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
         @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

         @include('sweetalert::alert')
   </body>
   @endsection
</html>
