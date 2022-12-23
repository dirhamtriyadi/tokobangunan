@extends('master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <h1>Penjualan</h1>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{ route('penjualan') }}" class="btn btn-primary mb-4">Kembali</a>
                    <form action="{{ route('penjualan.store') }}" method="POST">
                        @csrf
                        <input type="text" id="id" name="id" value="{{ $penjualan->id }}" hidden>
                        <div class="mb-3">
                            <label for="tgl" class="form-label">Tanggal</label>
                            <div class="input-group date" id="date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input"
                                    data-target="#date" name="tgl" value="{{ $penjualan->tgl }}">
                                <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            @error('tgl')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="karyawan_id" class="form-label">Nama Karyawan</label>
                            <select name="karyawan_id" id="karyawan_id" class="form-control">
                                <option value="{{ $penjualan->karyawan_id }}">{{ $penjualan->karyawan_id }} - {{ $penjualan->karyawan->nama }}</option>
                                @foreach ($karyawan as $item => $i)
                                    <option value="{{ $i->id }}">{{ $i->id }} - {{ $i->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            @error('karyawan_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection

@push('css')
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endpush

@push('js')
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });
    </script>
@endpush
