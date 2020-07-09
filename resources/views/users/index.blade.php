@extends('dashboard')
<!DOCTYPE html>

<html lang="en">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/datatableBotstrap.css" rel="stylesheet">
<link href="css/colors/blue.css" id="theme" rel="stylesheet">
<link href="css/responsiveDatatable.css" rel="stylesheet">

<link href="css/colors/blue.css" id="theme" rel="stylesheet">

<link data-require="datatables@1.10.12" data-semver="1.10.12" rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}


   <script>
   
   $(document).ready( function () {
     
    $('#laravel_datatable').DataTable({
           processing: true,
           serverSide: true,
           "sScrollX": true,
           "sScrollXInner": "100%",
         //   "sScrollY": "100%",
         responsive: true,
         language: { search: '', searchPlaceholder: "search ..." , sLengthMenu: " _MENU_ " },
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



      $('body').on('click', '.delete', function () {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = $(this).attr('data-id');
       
        swal({
            title: "kamu yakin ?",
            text: "Jika anda yakin maka data ini akan di hapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post("user.delete/"+id, {
                   },
                  function(data) {
                    swal("Data berhasil terhapus", {
                                icon: "success",
                                button: false,
                            });
                });

              setTimeout(function() {
                window.location.reload();
                
                }, 2000);
            } else {
                swal("Oke Data anda masih utuh !");
            }
        });
    });

   $('body').on('click', '.show', function () {
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
               url: "user.show/"+ user_id,
               data: "id="+user_id,
               
               success: function (data) {
                  $('.container').html(data);	
                
               },
               error: function (data) {
                  console.log('Error:', data);
               }
         });
   });
   $('body').on('click', '.edit', function () {
         var user_id = $(this).attr("data-id");

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
           
            <table class="table table-striped table-bordered" id="laravel_datatable" >
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
         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   </body>
   @endsection
</html>
