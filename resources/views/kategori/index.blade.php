@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card=title">{{$page->title}}</h3>
        <div class="card-tools">
            <a href="{{route('kategori.create')}}" class="btn btn-sm btn-primary mt-1">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Filter:</label>
                    <div class="col-3">
                        <select name="kategori_id" id="kategori_id" class="form-control" required>
                            <option value="">- Semua -</option>
                            @foreach($kategori as $item)
                                <option value="{{$item->kategori_id}}">{{$item->kategori_nama}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Kategori</small>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover table-sm" id="table_kategori">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection
@push('css')
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            var dataKategori = $('#table_kategori').DataTable({
            serverSide: true, // serverSide: true, jika ingin menggunakan server side processing
            ajax: {
                "url": "{{ url('kategori/list') }}",
                "dataType": "json",
                "type": "POST",
                "data":function(d){
                    d.kategori_id = $('#kategori_id').val();
                }
            },
            columns: [
                {
                    data: "DT_RowIndex", // nomor urut dari laravel datatable addIndexColumn()
                    className: "text-center",
                    orderable: false,
                    searchable: false
                    },{
                    data: "kategori_kode", 
                    className: "",
                    orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                    },{
                    data: "kategori_nama", 
                    className: "",
                    orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                    },{
                    data: "aksi", 
                    className: "",
                    orderable: false, // orderable: true, jika ingin kolom ini bisa  diurutkan
                    searchable: false // searchable: true, jika ingin kolom ini bisa dicari

                    }
                ]
            });
            $('#kategori_id').on('change',function(){
                dataKategori.ajax.reload();
            })
        });
    </script>
@endpush 