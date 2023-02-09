@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Petugas /</span> List Data</h4>
        <!-- Basic Bootstrap Table -->
        <div class="card">
        <div class="card-header">
        <h2>Laporan Petugas </h2>
                <form method="GET" action="" class="card-header row  py-3 mb-4">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="smallSelect">TANGGAL AWAL</label>
                            <input type="date" class="form-control" name="tgL_payment" value="{{ request()->tgL_payment ? request()->tgL_payment : "" }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                        <label for="smallSelect">TANGGAL AKHIR</label>
                            <input type="date" class="form-control" name="created_date" value="{{ request()->created_date ? request()->created_date : "" }}">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button style="margin-top: 20px" class="btn btn-primary"><i class="flaticon-interface-4"></i> FILTER</button>
                    </div>
                    <div class="col-lg-2">
                    <a target="_blank" href="{{route('report.petugas.pdf')}}" class="btn btn-secondary btn-round ml-auto">
                        <i class="fa fa-file-pdf"></i>
                        DOWNLOAD PDF
                    </a>
                    </div>
                    <div class="col-lg-2">
                    <a target="_blank" href="" class="btn btn-default btn-round ">
                        <i class="fas fa-file-download"></i>
                        DOWNLOAD DATA
                    </a>
                    </div>
                    
                </form>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
            <thead>
                <tr>
                <th>ID Petugas</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>Level</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach ($petugas as $data)
                <tr>
                    <td>{{ $data->id_petugas }}</td>
                    <td>{{ $data->nama_petugas }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->id_level }}</td>
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