@extends('dashboard')
<!DOCTYPE html>

<html lang="en">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/colors/blue.css" id="theme" rel="stylesheet">
<link href="css/datatableBotstrap.css" rel="stylesheet">
<link href="css/responsiveDatatable.css" rel="stylesheet">

<link data-require="datatables@1.10.12" data-semver="1.10.12" rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

   <script>
   
   $(document).ready( function () {
     
    $('#laravel_datatable').DataTable({
           processing: true,
           serverSide: true,
           responsive: true,
           "sScrollX": true,
           "sScrollXInner": "123%",
           language: { search: '', searchPlaceholder: "search ..." , sLengthMenu: " _MENU_ " },
         
         //   "sScrollY": "100%",
         //   "sScrollYInner": "110%",
           ajax: "{{ route('dataTable.product') }}",
         
           columns: [
                    { data: 'DT_RowIndex', name:'id'},
                    { data: 'image', name: 'image' },
                    { data: 'name', name: 'name' },
                    { data: 'brand', name: 'brand' },
                    { data: 'type', name: 'type' },
                    { data: 'status', name: 'stock' },
                    { data: 'stock', name: 'stock' },
                    { data: 'price',  render: $.fn.dataTable.render.number( '.',',', 0, 'Rp')},
                    { data: 'priceperWeek',  render: $.fn.dataTable.render.number( '.',',', 0, 'Rp')},
                    { data: 'priceperMonth',  render: $.fn.dataTable.render.number( '.',',', 0, 'Rp')},
                    { data: 'spesifikasi',  name:'spesifikasi'},
                    { data: 'action',name: 'action', orderable: false ,searchable: false},
                 ],
                 "columnDefs": [
                            { "width": "5%", "targets": 0, "className": "text-center",},
                            { "width": "20%", "targets": 2 },
                            { "width": "7%", "targets": 3 },
                            { "width": "10%", "targets": 4 },
                            { "width": "5%", "targets": 5, "className": "text-center", },
                            { "width": "5%", "targets": 6, "className": "text-center", },
                            {  "targets": 7, "className": "text-center", },
                            {  "targets": 8, "className": "text-center", },
                            {  "targets": 9, "className": "text-center", },
                            { "width": "27%", "targets": 10 },
                            { "width": "27%", "targets": 11 },
                         ],
                 
               //   "dom": 'Bfrtip',
               //   "buttons": [ 'copy', 'csv', 'excel', 'pdf', 'print' ]     
        });


   //       $('body').on('click', '.delete', function () {
   //       var product_id = $(this).attr("data-id");
   //       var alert = confirm("Apakah Kamu yakin Ingin Menghapus ini  !");
   //       if (alert) {
   //           $(this).closest('tr').remove();
           
   //          } else{
   //          return false;
   //       }
   //       $.ajaxSetup({
   //             headers: {
   //                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   //             }
   //          });
   //       $.ajax({
   //             type: "DELETE",
   //             url: "product.delete/"+product_id,
   //             data: "id="+product_id,
               
   //             success: function (data) {
   //                console.log('Succes:', data);
      
   //             },
   //             error: function (data) {
   //                console.log('Error:', data);
   //             }
   //       });
   // });

   $('body').on('click', '.delete', function () {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = $(this).attr('data-id');
        console.log(id);
       
        swal({
            title: "kamu yakin ?",
            text: "Jika anda yakin maka data ini akan di hapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post("product.delete/"+id, {
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
         var product_id = $(this).attr("data-id");
         $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });
         $.ajax({
               type: "POST",
               url: "product.show/"+ product_id,
               data: "id="+product_id,
               
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

   $('body').on('click', '.edit', function () {
         var product_id = $(this).attr("data-id");
         $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });
         $.ajax({
               type: "POST",
               url: "product.edit/"+ product_id,
               data: "id="+product_id,
               
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
           
           <div class="container-fluid">
               <div class="row">
                  <a href="{{ route('input-product') }}" class="btn btn-info ml-auto" id="createProduct">
                     <i class="fa fa-plus"></i>
                  tambah data  </a>
               </div>
           </div>
           
            <table class="table table-striped table-bordered" id="laravel_datatable"  >
               <thead>
                  <tr >
                     <th>Id</th>
                     <th>Gambar</th>
                     <th>Nama</th>
                     <th>Merk</th>
                     <th>Type</th>
                     <th>Status</th>
                     <th>Stock</th>
                     <th>Harga </th>
                     <th>Harga Perminggu</th>
                     <th>Harga Perbulan</th>
                     <th>Spesifikasi</th>
                     <th>Action</th>
                     
                  </tr>
               </thead>
               <tbody>
                  
               </tbody>
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


