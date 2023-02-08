@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
    @endif
    <div class="row">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Petugas /</span> List Data</h4>
        <!-- Basic Bootstrap Table -->
        <div class="card">
        <h5 class="card-header">Table Basic</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
            <thead>
                <tr>
                <th>ID Petugas</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>Level</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach ($petugas as $data)
                <tr>
                    <td>{{ $data->id_petugas }}</td>
                    <td>{{ $data->nama_petugas }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->id_level }}</td>
                    <td><form action="{{ route('petugas.destroy',$data->id_petugas) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('petugas.edit',$data->id_petugas) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
</div>
@endsection