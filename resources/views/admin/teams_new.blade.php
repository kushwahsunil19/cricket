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
                <h1>Teams Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Team</li>
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
                        <h3 class="card-title" style="padding-top:8px;">Teams listing</h3>
                        <button type="button" style="width: 150px;float:right;" class="btn btn-block btn-primary" data-toggle="modal" data-target="#linkModal">Upload Teams csv</button>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Ranking</th>
                                    <th>Team Ref</th>
                                    <th>Team Name</th>
                                    <th>Points</th>
                                    <th>Matches</th>
                                    <th>Team Flag</th>
                                    <th>Year</th>
                                    <th>Month</th>
                                    <th>Type</th>
                                    <th>Menu Type</th>
                                   <!--  <th>Action</th> -->
                                </tr>
                            </thead>
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    
    <div class="modal fade" id="linkModal" tabindex="-1" role="dialog" aria-labelledby="linkModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card-custom card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Upload Teams CSV</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" id="formData" action="{{ route('upload.teams_csv') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body" style="padding-bottom: 0;">
                            <div class="form-group">
                                <label for="exampleInputFile">Upload Csv</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="teams_csv" id="exampleInputFile" required onchange="updateFileNameLabel()" accept=".csv">
                                        <label class="custom-file-label" id="fileLabel" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Select Menu Type</label>
                                <select class="form-control" name="menu_type" required>
                                    <option value="">Select Menu Type</option>
                                    @foreach($meun_type as $types )
                                    <option value="{{$types->id}}">{{$types->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Team Type</label>
                                <select class="form-control" name="type" required>
                                    <option value="">Select Team Type</option>
                                    @foreach($team_type as $types )
                                    <option value="{{$types->id}}">{{$types->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <a href="{{ asset('demo_csv/teams.csv') }}" style="padding-left: 20px;">Download demo csv</a>
                        <div class="modal-footer" style="margin-top:20px;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
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
    toastr.error("{{ session('error') }}");
    @endif
    // $(function() {

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
               var teamTable = $('#example1').DataTable({
                processing: true,
                serverSide: true,
                headers: {'XSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                ajax: {
                    url: "{{ route('teams') }}",
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
                            var currentPage = teamTable.page.info().page; // Get the current page index
                            var pageLength = teamTable.page.info().length; // Get the page length
                            var serialNumber = (currentPage * pageLength) + meta.row + 1; // Calculate serial number
                            return serialNumber;
                        },
                       orderable: false 
                    },
                    {
                        data: 'ranking',
                    },

                     {
                        data: 'team_ref',
                    },
                      {
                        data: 'team',
                    },
                     {
                        data: 'points',
                    },
                     {
                        data: 'matches',
                    },
                     {
                    data: 'team_flag_link',
                    render: function(data, type, row) {
                    return `<img src="${data}" alt="Team Flag"onclick="window.open('team_flag_link','_blank')" style="cursor:pointer" height="40" width="40"  />`;
                    }
                    },
                     {
                        data: 'year',
                    },
                     {
                        data: 'month',
                    },
                     {
                        data: 'type.name',
                    },
                     {
                        data: 'menutype.name',
                    },
                    // {
                    //     data: 'id',                    
                    //     render: function(data, type, row) {
                    //         return ` <a class="btn btn-danger btn-sm delete-row" href="#" data-toggle="modal"  data-id="${data}">
                    //                         <i class="fas fa-trash">
                    //                         </i>
                    //                     </a>`; //you can add your view route here

                    //     },
                    //       orderable: false 
                    // }
                ]
            });
        $(document).on('click', '.delete-row', function() {

             var id = $(this).data("id");
             var token = $("meta[name='csrf-token']").attr("content");

            if (confirm("Are you sure you want to delete this team?") == true) {
                $.ajax({

                    url: "delete-team/"+id,
                    type: 'GET',
                    data: {
                    "id": id,
                    "_token": token,
                    },
                        success: function (response){
                    console.log(response);
                    if (response.success) {
                        console.log("team deleted successfully");
                        // Redraw the table after successful deletion
                        teamTable.draw();
                        // Display success message
                        //alert("Player deleted successfully");
                    } else {
                        console.error("Error deleting player:", response.message);
                        // Display error message
                        alert("Error deleting player: " + response.message);
                    }
                    },
                    error: function(xhr, status, error) {
                    console.error("Error deleting player:", error);
                    // Display error message
                    alert("Error deleting player: " + error);
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
