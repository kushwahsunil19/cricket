@extends('admin.layouts.app')
@push('singlePageCss')
<link rel="stylesheet" href="{{asset ('/admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset ('/admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset ('/admin_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset ('/admin_assets/plugins/toastr/toastr.min.css') }}">

@endpush
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Players Data</h1>
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
                        <h3 class="card-title" style="padding-top:8px;">Players listing</h3>
                        <button type="button" style="width: 150px;float:right;" class="btn btn-block btn-primary" data-toggle="modal" data-target="#linkModal">Upload Player csv</button>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Ranking</th>
                                    <th>Player Image</th>
                                    <th>Player Name</th>
                                    <th>Team Flag</th>
                                    <th>Team Name</th>
                                    <th>Points</th>
                                    <th>Year</th>
                                    <th>Month</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($players as $item)
                                <tr>
                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$item->ranking}}</td>
                                    <td><img src="{{$item->player_image_link}}" height="40" width="40" onclick="window.open('{{$item->player_image_link}}','_blank')" style="cursor:pointer"></td>
                                    <td>{{$item->player}} </td>
                                    <td><img src="{{$item->team_flag_link}}" onclick="window.open('{{$item->team_flag_link}}','_blank')" style="cursor:pointer"></td>
                                    <td>{{$item->team}}</td>
                                    <td>{{$item->points}}</td>
                                    <td>{{$item->year}}</td>
                                    <td>{{$item->month}}</td>
                                    <td class="project-actions text-right">
                                        <!-- <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a> -->
                                        <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deleteModel-{{ $item->id }}">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($players as $item)
    <div class="modal fade" id="deleteModel-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
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
                                    document.getElementById('deleteBlog-{{ $item->id }}').submit();">Confirm</button>
                    <form id="deleteBlog-{{ $item->id }}" action="{{ route('delete-player', ['id' => $item->id]) }}" method="GET" style="display:none;" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="modal fade" id="linkModal" tabindex="-1" role="dialog" aria-labelledby="linkModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card-custom card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Upload Players CSV</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" id="formData" action="{{ route('upload.players_csv') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body" style="padding-bottom: 0;">
                            <div class="form-group">
                                <label for="exampleInputFile">Upload Csv</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="players_csv" id="exampleInputFile" required onchange="updateFileNameLabel()">
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
                    <a href="{{ asset('demo_csv/players.csv') }}" style="padding-left: 20px;">Download demo csv</a>
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
    toastr.success("{{ session('error') }}");
    @endif
    $(function() {

        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": true,
            "sScrollX": "100%",
            "sScrollXInner": "110%",
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "width": "100%"
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
