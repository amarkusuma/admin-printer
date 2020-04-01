
​
@extends('dashboard')
<!DOCTYPE html>

<html lang="en">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <link  href="https://cdn.bootcss.com/datatables/1.10.19/css/dataTables.bootstrap4.css" rel="stylesheet"> --}}

<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/table.css" rel="stylesheet">
<!-- You can change the theme colors from here -->
<link href="css/colors/blue.css" id="theme" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</head>

@section('content')
      <body>
        
         <div class="container">
          <div class="container-fluid">
            <div class="row">
               <a href="{{ route('create-role') }}" class="btn btn-info ml-auto" id="createPrinter">
                  <i class="fa fa-plus-circle"></i>
                  </a>
            </div>
          </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr class="thead">
                    <th ><center><h5>#</h5></center></th>
                    <th><center><h5>Nama</h5></center></th>
                    <th><center><h5>Guard</h5></center></th>
                    <th><center><h5>Updated</h5></center></th>
                    <th><center><h5>Action</h5></center></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($role as $value )
                  <tr>
                    <td scope="row">{{ ++$i }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->guard_name }}</td>
                    <td>{{ $value->updated_at->formatLocalized('%A ,%d %B %Y') }}</td>
                    <td>
                    <button type="button" name="show" data-id="{{$value->id}}" class="show btn btn-success btn-sm ShowRole"> <i class="fa fa-eye"></i></button>
                    &nbsp;&nbsp;
                    @can('Update')
                    <button type="button" name="show" data-id="{{$value->id}}" class="edit btn btn-info btn-sm EditRole"> <i class="fa fa-edit"></i></button>
                    &nbsp;&nbsp;
                    @endcan
                    @can('Delete')
                    <button type="button" name="show" data-id="{{$value->id}}" class="delete btn btn-danger btn-sm DeleteRole"> <i class="fa fa-trash-o"></i></button>
                    &nbsp;&nbsp;
                    @endcan
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
         </div>


         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
         @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

         @include('sweetalert::alert')



<script>

  //    $(document).ready(function(){
  //     $('body').on('click', '.delete', function () {
  //        var product_id = $(this).attr("data-id");
  //        var alert = confirm("Apakah Kamu yakin Ingin Menghapus ini  !");
  //        if (alert) {
  //            $(this).closest('tr').remove();
           
  //           } else{
  //           return false;
  //        }
  //        $.ajaxSetup({
  //              headers: {
  //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //              }
  //           });
  //        $.ajax({
  //              type: "DELETE",
  //              url: "printer.delete/"+product_id,
  //              data: "id="+product_id,
               
  //              success: function (data) {
  //                 console.log('Succes:', data);
      
  //              },
  //              error: function (data) {
  //                 console.log('Error:', data);
  //              }
  //        });
  //  });

  //  $('body').on('click', '.show', function () {
  //        var product_id = $(this).attr("data-id");
  //        // confirm("Are You sure want to delete !");
  //        // $(this).closest('tr').remove();
  //        $.ajaxSetup({
  //              headers: {
  //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //              }
  //           });
  //        $.ajax({
  //              type: "POST",
  //              url: "printer.show/"+ product_id,
  //              data: "id="+product_id,
               
  //              success: function (data) {
  //                 // console.log('Succes:', data);
  //                 $('.container').html(data);	
  //                 // window.location = "printer.show/"+product_id;
  //              },
  //              error: function (data) {
  //                 console.log('Error:', data);
  //              }
  //        });
  //  });
   $('body').on('click', '.edit', function () {
         var role_id = $(this).attr("data-id");
         // confirm("Are You sure want to delete !");
         // $(this).closest('tr').remove();
         $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });
         $.ajax({
               type: "GET",
               url: "role.edit/"+ role_id,
               data: "id="+role_id,
               
               success: function (data) {
                  // console.log('Succes:', data);
                  $('.container').html(data);	
                  // window.location = "printer.show/"+role_id;
               },
               error: function (data) {
                  console.log('Error:', data);
               }
         });
   });
    
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@include('sweetalert::alert')
   </body>
   @endsection
</html>
