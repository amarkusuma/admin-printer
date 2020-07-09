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

    var table = $('#laravel_datatable').DataTable({
           processing: true,
           serverSide: true,
           "sScrollX": true,
         //   "sScrollXInner": "120%",
           
            responsive: true,
            language: { search: '', searchPlaceholder: "search ..." , sLengthMenu: " _MENU_ " },
            ajax: {
             "url": "{{ route('dataTable.order') }}",
             "data" : function (d) {
                    d.from_date = $('#from_date').val();
                    d.to_date = $('#to_date').val();
            }
            },   
         
            columns: [
                    { data: 'DT_RowIndex', name:'id'},
                    { data: 'name_costumer', name: 'name_costumer' },
                    { data: 'email', name:'email' },
                    { data: 'no', name:'no' },
                    { data: 'address', name:'address' },
                    { data: 'jam', name:'jam' },
                    { data: 'tgl_pesan', name:'tgl_pesan' },
                    { data: 'tgl_kembali', name:'tgl_kembali' },
                    { data: 'status', name:'status' },
                    { data: 'type', name:'type' },
                    { data: 'verified', name:'verified' },
                    { data: 'action',name:'action', orderable: false ,searchable: false},
                 ],
                 "columnDefs": [
                            { "width": "5%", "targets": 0, "className": "text-center",},
                            { "width": "15%", "targets": 1 },
                            { "width": "20%", "targets": 2 },
                            { "width": "25%", "targets": 4 },
                            { "width": "7%", "targets": 5, "className": "text-center", },
                            { "width": "10%", "targets": 6, "className": "text-center", },
                            { "width": "10%", "targets": 7, "className": "text-center", },
                            {  "targets": 10, "className": "text-center", },
                            // {  "targets": 9, "className": "text-center", },
                            // { "width": "27%", "targets": 10 },
                            // { "width": "27%", "targets": 11 },
                         ],
               //   "dom": 'Bfrtip',
               //   buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print' ]  
               
      });
 
      $('#filter').click(() => {
         var from_date = $('#from_date').val();
         var to_date = $('#to_date').val();
            if(from_date != '' &&  to_date != ''){
                  table.draw();
            }else{
                  alert('Wajib di isi ');
               }
         });  
            
      $('#refres').click( () => {
         $('#from_date').val('');
         $('#to_date').val('');
         table.draw();
      })
   });

  </script>


</head>

@section('content')
      <body>
        
         <div class="container">
           
           <div class="container-fluid">
               <div class="row">
                  <a href="" class="btn btn-danger ml-auto" id="pdf">
                     <i class="fa fa-file-pdf-o"></i>
                     PDF</a>
               </div>
           </div>
           <div>
               <input type="date" name="from_date" id="from_date"  />
               <label for="time"> -- </label>
               <input type="date" name="to_date" id="to_date"  />
               
               <input type="submit" value="Filter" name="filter" id="filter"/>
               <input type="submit" value="refres" name="refres" id="refres"/>
           </div>
           
            <table class="table table-striped table-bordered" id="laravel_datatable" >
               <thead>
                  <tr >
                     <th>Id</th>
                     <th>Nama</th>
                     <th>Email</th>
                     <th>Nomer</th>
                     <th>Alamat</th>
                     <th>Wktu Order</th>
                     <th>Tgl Order</th>
                     <th>Tgl Kembali</th>
                     <th>Status</th>
                     <th>Type</th>
                     <th>Verified</th>
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
