@extends('admin.layouts.app')

@push('singlePageCss')
<link rel="stylesheet" href="{{ asset('/admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('/admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin_assets/plugins/toastr/toastr.min.css') }}">
@endpush

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Contact Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
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
                        <h3 class="card-title" style="padding-top:8px;">Feedback listing</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contactDetails as $contact)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                    <td class="project-actions text-right">
                                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteModel-{{ $contact->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
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

    @foreach($contactDetails as $contact)
    <div class="modal fade" id="deleteModel-{{ $contact->id }}" tabindex="-1" role="dialog"
        aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Delete Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this contact?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"
                        onclick="event.preventDefault(); document.getElementById('destroy-{{ $contact->id }}').submit();">
                        Confirm
                    </button>
                    <form id="destroy-{{ $contact->id }}"
                        action="{{ route('admin.contact.delete', ['id' => $contact->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="modal fade" id="createModel" tabindex="-1" role="dialog" data-backdrop="static"
        aria-labelledby="mediumModalLabel" aria-hidden="true" style="display: none;">
        <!-- Your create model code goes here -->
    </div>
</section>

@endsection

@push('script')
<script src="{{ asset('/admin_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/toastr/toastr.min.js')}}"></script>

<script>
    @if (Session:: has('message'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ session('message') }}");
    @endif
    @if (Session:: has('error'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ session('error') }}");
    @endif
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": true,
            "sScrollX": "100%",
            "sScrollXInner": "110%",
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush
