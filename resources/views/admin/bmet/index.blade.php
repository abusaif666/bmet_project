@extends('admin.layouts.admin')

@section('title', 'BMET List')

@section('content')

    <div class="table-wrapper">

        <div class="table-header">

            <div class="table-header-top">

                <div class="table-info">
                    <h3 class="table-title">BMET List</h3>

                    <div class="breadcrumb">
                        <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                        <span><i class="fa-solid fa-caret-right"></i></span>
                        <span>BMET List</span>
                    </div>
                </div>

                <div>
                    <a href="{{ route('bmet.create') }}" class="btn-add">
                        <i class="fa-solid fa-plus"></i>
                        Add BMET
                    </a>
                </div>

            </div>

            <div class="table-header-bottom">
               
            </div>

        </div>

        <div class="table-responsive">

            <table class="custom-table">

                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Passport No</th>
                        <th>Country</th>
                        <th>BMET No</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($bmets as $key => $data)
                        <tr>

                            <td>{{ $key + 1 }}</td>

                            <td>
                                <span class="copy-text">{{ $data->name }}</span>
                                <button class="copy-btn">
                                    <i class="fa fa-copy"></i>
                                </button>
                            </td>

                            <td>
                                <span>{{ $data->passport_no ?? 'N/A' }}</span>
                            </td>

                            <td>
                                <span>{{ $data->country ?? 'N/A' }}</span>
                            </td>

                            <td>
                                <span>{{ $data->bmet_no ?? 'N/A' }}</span>
                            </td>


                            <td class="text-end">

                                <div class="action-group">

                                    <a class="action-btn btn-edit bg-success" href="{{ route('bmet.card', $data->clearance_id) }}">
                                        <i class="fa-solid fa-address-card"></i>
                                    </a>

                                    <a class="action-btn btn-edit bg-success" href="{{ route('bmet.card.download', $data->clearance_id) }}">
                                        <i class="fa-solid fa-download"></i>
                                    </a>

                                    <a class="action-btn btn-edit bg-secondary" href="{{ route('bmet.show', $data->clearance_id) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    {{-- BMET Edit Button --}}
                                    <a class="action-btn btn-edit" href="{{ route('bmet.edit', $data->id) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    {{-- BMET Delete Button using AJAX --}}
                                    <button type="button" class="action-btn btn-delete bmetDeleteBtn"
                                        data-url="{{ route('bmet.destroy', $data->id) }}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="table-footer">
            {{ $bmets->links() }}
        </div>

    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {

            // DELETE BMET VIA AJAX
            $('.bmetDeleteBtn').on('click', function(e) {

                e.preventDefault();

                let url = $(this).data('url');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {

                    if (result.isConfirmed) {

                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function(res) {

                                if (res.status === 'success') {

                                    Swal.fire({
                                        toast: true,
                                        position: 'top-end',
                                        icon: 'success',
                                        title: res.message,
                                        background: '#198754',
                                        color: '#ffffff',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        timerProgressBar: true
                                    }).then(() => {
                                        window.location.reload();
                                    });

                                } else {
                                    showErrorAlert();
                                }
                            },
                            error: function(xhr) {
                                showErrorAlert();
                            }
                        });
                    }
                });
            });

            function showErrorAlert() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: 'Something Went Wrong',
                    background: '#dc3545',
                    color: '#ffffff',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                });
            }

        });
    </script>
@endsection