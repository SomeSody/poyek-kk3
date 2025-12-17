@extends('adminlte::page')

@section('title', 'Berkas')

@section('content_header')
    <h1>Berkas</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('berkas.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
        </div>
        <div class="card-body table-responsive">
            <table id="crudTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="60">ID</th>
                        <th>Permohonan Id</th>
                        <th>Nama Berkas</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($berkas as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->permohonan_id }}</td>
                        <td>{{ $item->nama_berkas }}</td>
                        <td>
                            <a href="{{ route('berkas.show', $item) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('berkas.edit', $item) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('berkas.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">No data</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{-- pagination server side --}}
            {{ $berkas->links() }}
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function () {
            // aktifkan datatable, tapi biarkan pagination Laravel tetap tampil
            $('#crudTable').DataTable({
                "paging": false, // kita matikan paging datatables karena sudah pakai pagination Laravel
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering":  true,
                "info": false,
                "searching": true
            });
        });
    </script>
@stop