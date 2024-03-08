@extends('admin.layouts.app')
@push('singlePageCss')
<link rel="stylesheet" href="{{asset ('/admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset ('/admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset ('/admin_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset ('/admin_assets/plugins/toastr/toastr.min.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Log Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Players</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="padding-top:8px;">Log listing</h3>
                       
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Filename </th>
                                    <th>Menu Type </th>
                                    <th>Team Type </th>
                                    <th>Player Type </th>
                                    <th>Crated Date</th>  
                                   <!--  <th>Time</th>  -->
                                    <th>Total Rows</th>                                              
                                    <th>Action</th>
                                </tr>
                            </thead>
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 

</section>
 <div class="modal fade" id="deleteModel-4864" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Delete Player</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure you want to delete this Player?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                    document.getElementById('deleteBlog-4864').submit();">Confirm</button>
                    <form id="deleteBlog-4864" action="{{ route('delete-player', ['id' => 4864]) }}" method="GET" style="display:none;" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script src="{{asset ('/admin_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset ('/admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset ('/admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{asset ('/admin_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{asset ('/admin_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset ('/admin_assets/plugins/toastr/toastr.min.js')}}"></script>

<script>
    @if(Session::has('success'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ session('success') }}");
    @endif
    @if(Session::has('error'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ session('error') }}");
    @endif
     //$(function() {

    //     $("#example1").DataTable({
    //         "responsive": true,
    //         "lengthChange": false,
    //         "autoWidth": true,
    //         "sScrollX": "100%",
    //         "sScrollXInner": "110%",
    //     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    //     $('#example2').DataTable({
    //         "paging": true,
    //         "lengthChange": false,
    //         "searching": false,
    //         "ordering": false,
    //         "info": true,
    //         "autoWidth": false,
    //         "responsive": true,
    //         "width": "100%"
    //     });
    // });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            var logTable = $('#example1').DataTable({
                processing: true,
                serverSide: true,
                headers: {'XSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                ajax: {
                    url: "{{ route('logs') }}",
                    type: "POST",
                    data: function (data) {
                        data.search = $('input[type="search"]').val();
                    }
                },
                order: ['1', 'DESC'],
                pageLength: 10,
                searching: true,
                aoColumns: [
                   { 
                        data: null, 
                        render: function (data, type, row, meta) {
                            var currentPage = logTable.page.info().page; // Get the current page index
                            var pageLength = logTable.page.info().length; // Get the page length
                            var serialNumber = (currentPage * pageLength) + meta.row + 1; // Calculate serial number
                            return serialNumber;
                        },
                        orderable: false 
                    },
                    {
                        data: 'filename',
                        render: function(data, type, row) {
                            // Construct the full URL dynamically
                            var baseUrl = window.location.protocol + "//" + window.location.host;
                            return '<a href="' + baseUrl + '/uploads/' + data + '" download>' + data + '</a>';
                        }
                    },
                    {
                        data: 'menu_type_id',
                        render: function(data, type, row) {
                            // Assuming you have the menuType relationship
                            return row.menu_type_name.name; // Use the name from the relationship
                        }
                    },
                    {
                        data: 'team_type_id',
                        render: function(data, type, row) {
                            // Assuming you have the teamType relationship
                            return row.team_type_name.name; // Use the name from the relationship
                        }
                    },
                    {
                        data: 'player_type_id',
                        render: function(data, type, row) {
                            // Assuming you have the teamType relationship
                            return row.player_type_name.name; // Use the name from the relationship
                        }
                    },
                    {
                    data: 'created_at',
                    render: function(data, type, row) {
                    var date = new Date(data);
                    var formattedDate = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
                    var hours = ('0' + date.getHours()).slice(-2);
                    var minutes = ('0' + date.getMinutes()).slice(-2);
                    var seconds = ('0' + date.getSeconds()).slice(-2);
                    var formattedTime = hours + ':' + minutes + ':' + seconds;
                    return formattedDate + ' ' + formattedTime;
                    }
                    },
                    // {
                    //     data: 'created_at',
                    //     render: function(data, type, row) {
                    //     var date = new Date(data);
                    //     // Format time as HH:mm:ss
                    //     var formattedTime = ('0' + date.getHours()).slice(-2) + ':' + ('0' + date.getMinutes()).slice(-2) + ':' + ('0' + date.getSeconds()).slice(-2);
                    //     return formattedTime;
                    //     }
                    // },
                     {
                    data: 'total_csv_row',

                    },
                    {
                        data: 'id',                    
                        render: function(data, type, row) {
                            // return `<a class="btn btn-danger btn-sm delete-row" href="#" data-toggle="modal"  data-id="${data}">
                            //             <i class="fas fa-trash"></i>
                            //         </a>`;
                            var baseUrl = window.location.protocol + "//" + window.location.host;
                            
                            return `<a class="btn btn-primary btn-sm viewData" href="${baseUrl}/admin/details/${data}" target="_blank">
                            <i class="fas fa-eye"></i>
                        </a>`;
                        },                        
                        orderable: false 
                    }
                ]
            });

               $(document).on('click', '.delete-row', function() {

             var id = $(this).data("id");
             var token = $("meta[name='csrf-token']").attr("content");

            if (confirm("Are you sure you want to delete this Log?") == true) {
                $.ajax({

                    url: "delete-log/"+id,
                    type: 'GET',
                    data: {
                    "id": id,
                    "_token": token,
                    },
                        success: function (response){
                    console.log(response);
                    if (response.success) {
                        console.log("log deleted successfully");
                        // Redraw the table after successful deletion
                        logTable.draw();
                        // Display success message
                        //alert("Player deleted successfully");
                    } else {
                        console.error("Error deleting log:", response.message);
                        // Display error message
                        alert("Error deleting player: " + response.message);
                    }
                    },
                    error: function(xhr, status, error) {
                    console.error("Error deleting log:", error);
                    // Display error message
                    alert("Error deleting log: " + error);
                    }
                });
            }

        });
        $(document).on('click', '.delete-row', function() {

             var id = $(this).data("id");
             var token = $("meta[name='csrf-token']").attr("content");

            if (confirm("Are you sure you want to delete this Log?") == true) {
                $.ajax({

                    url: "delete-log/"+id,
                    type: 'GET',
                    data: {
                    "id": id,
                    "_token": token,
                    },
                        success: function (response){
                    console.log(response);
                    if (response.success) {
                        console.log("log deleted successfully");
                        // Redraw the table after successful deletion
                        logTable.draw();
                        // Display success message
                        //alert("Player deleted successfully");
                    } else {
                        console.error("Error deleting log:", response.message);
                        // Display error message
                        alert("Error deleting player: " + response.message);
                    }
                    },
                    error: function(xhr, status, error) {
                    console.error("Error deleting log:", error);
                    // Display error message
                    alert("Error deleting log: " + error);
                    }
                });
            }

        });
        });

</script>
@endpush
@push('script')
<script>
    function updateFileNameLabel() {
        var fileName = document.getElementById("exampleInputFile").files[0].name;
        document.getElementById("fileLabel").innerHTML = fileName;
    }
</script>
@endpush
