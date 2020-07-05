@extends('layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pengaturan Artikel</h6>
    </div>
    <div class="card-body">
        <a href="{{url('/artikel/create')}}" class="btn btn-secondary btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a>
        <hr>
        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Judul</th>
                      <th>Isi</th>
                      <th>Pembuat</th>
                      <th>Tanggal Dibuat</th>
                      <th>Tanggal Diperbaharui</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($items as $det)
                    <tr>
                      <td>{{$det->judul}}</td>
                      <td>{{$det->isi}}</td>
                      <td>{{$det->username}}</td>
                      <td>{{date("d F Y H:i:s", strtotime($det->created_at))}}</td>
                      <td>{{!empty($det->updated_at)?date("d F Y H:i:s", strtotime($det->updated_at)):'-'}}</td>
                      <td>
                        <!-- tombol lihat -->
                        <a href="{{url('/artikel/'.$det->artikel_id)}}" class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                            <i class="fas fa-eye"></i>
                            </span>
                            <span class="text">Detail</span>
                        </a>

                        <!-- tombol ubah -->
                        <a href="{{url('/artikel/'.$det->artikel_id.'/edit')}}" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                            <i class="fas fa-pen"></i>
                            </span>
                            <span class="text">Ubah</span>
                        </a>

                        <!-- tombol hapus -->
                        <form action="{{url('/artikel/'.$det->artikel_id)}}" style="display:inline;" method="POST">
                          @csrf
                          @method('DELETE')
                            <button type="submit" id="tombol-hapus" href="javascript:;" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Hapus</span>
                            </a>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
  setTimeout(() => {
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    });
  }, 100);
   

    // documents.getElementById('tombol-hapus').addEventListener(function(){
    //     alert('asdasd');
    // });

</script>
@endpush