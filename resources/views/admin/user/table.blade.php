@extends('layout.main')
@section('content')
    <div class="container">
        <div class="breadcrumb mt-3">
            <h3>Petugas/</h3>
        </div>
        <div class="card">
            <div class="mt-3 px-5">
                <a href="/petugas/form" class="btn btn-primary">
                    <i class="fas fa-plus"></i>Tambah Petugas
                </a>
                <div class="table-responsive">
                    <table class="table table-striped ">
                        <thead>
                            <th>No</th>
                            <th>Nama Petugas</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Update</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @if ($user->count() == 0)
                                <tr >
                                    <td colspan="6" class="text-center ">(Data Petugas Kosong)</td>
                                </tr>
                            @endif
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="/petugas/destroy/{{ $item->id }}" class="btn btn-danger "><i class="fas fa-trash-can"></i></a>
                                        <button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#modalId".{{ $item->id }}><i class="fas fa-pen-to-square"></i></button>
                                    </td>
                                </tr>
                                @php
                                    $no++;
                                @endphp


                                <!-- Modal -->
                                <div class="modal fade" id="modalId".{{ $item->id }}>
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    Form Udate Petugas
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <form action="/petugas/update/{{ $item->id }}" method="POST">
                                                        @csrf
                                                        <div class="mb-3 ">
                                                            <label for="name" class="form-label">Nama User</label>
                                                            <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                                                        </div>
                                                        <div class="mb-3 ">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="text" class="form-control" id="email" name="email" value="{{ $item->email }}">
                                                        </div>
                                                        <div class="mb-3 ">
                                                            <label for="password" class="form-label">Password</label>
                                                            <input type="password" class="form-control" id="password" name="password">
                                                        </div>
                                                        <div class="mb-3 ">
                                                            <label for="role" class="form-label">Role</label>
                                                            <select  id="role" class="form-select" disabled >
                                                                <option value="">Petugas</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Status</label>
                                                            <select  id="status" class="form-select" disabled >
                                                                <option value="">Aktif</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 text-end">
                                                            <input type="submit" class="btn btn-success">
                                                        </div>
                                                       </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Sukses!",
            text: "{{ session('success') }}"
        });
    </script>
@endif
@endsection
