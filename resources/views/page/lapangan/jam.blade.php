@extends('page/layout/app')

@section('title', 'Jam Lapangan')

@section('content')
<style type="text/css">
  .btn.submit:hover{
    background-color: #1943E8 !important;
    border-color: #1943E8 !important;
  }
  .btn.reset:hover{
    background-color: #808080 !important;
    border-color: #808080 !important;
    color: white;
  }
</style>
<div class="page-heading">
	<div class="page-heading">
		<a href="{{route('lapangan')}}" class="btn btn-info">Kembali</a>
	</div>
	@foreach($lapangan as $dt)
	<div class="">
		<div class="row">
			<div class="col-md-6 col-offset-md-4">
				<div class="card">
					<h5 class="card-header">Tambah Jam {{$dt->nama_lap}}</h5>
					<div class="card-body">
						<form action="{{route('add_jam')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="">
						        <div class="row">
						            <div class="col-md-6 col-12">
						                <div class="form-group">
						                  <label for="city-column">Input Jam Mulai</label>
                                          <input type="hidden" value="{{$dt->id_lapangan}}" name="lapangan_id">
						                  <input type="time" id="city-column" class="form-control" name="jam_mulai" required>
						                </div>
						              </div>
						              <div class="col-md-6 col-12">
						                <div class="form-group">
						                  <label for="selesai">Input Jam Selesai</label>
						                  <input type="time" id="selesai" class="form-control" name="jam_selesai" required>
						                </div>
						              </div>
                                    <div class="col-md-3 col-12">
                                      <div class="form-group">
                                       <button type="submit"
                                       class="btn btn-primary mt-4 form-control" >Tambah</button>
                                     </div>
                                   </div>
                                   <div class="col-md-3 col-12">
                                    <div class="form-group">
                                     <button type="reset"
                                     class="btn btn-light-secondary mt-4 form-control reset" >Reset</button>
                                   </div>
                                 </div>
						        </div>
						    </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	<section class="section">
        <div class="card">
            <div class="card-header">
                With Data Jam
            </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama Lapangan</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $dt)
                    <tr>
                        <td>{{$loop->iteration}}. </td>
                        <td>{{$dt->nama_lapangan->nama_lap}}</td>
                        <td>{{ \Carbon\Carbon::parse($dt->jam_mulai)->format('H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($dt->jam_selesai)->format('H:i') }}</td>
                        <td align="center">
                            <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id_jam}}" class="btn btn-sm btn-success">
                                <i class="dripicons dripicons-document-edit"></i>
                            </button>
                            <a href="{{ route('delete_jam', $dt->id_jam) }}" onclick="return confirm('Yakin hapus data jam {{ \Carbon\Carbon::parse($dt->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($dt->jam_selesai)->format('H:i') }}?')" class="btn btn-sm btn-danger">
                                <i class="dripicons dripicons-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @foreach($data as $dt)
                    <div class="modal fade" id="edit{{$dt->id_jam}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Mengubah Data Jam
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form method="post" action="{{route('update_jam')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                          <label for="city-column">Input Jam Mulai</label>
                                          <input type="hidden" value="{{$dt->id_jam}}" name="id_jam">
                                          <input type="hidden" value="{{$dt->lapangan_id}}" name="lapangan_id">
                                          <input type="time" id="city-column" value="{{$dt->jam_mulai}}" required="" class="form-control" name="jam_mulai" required>
                                        </div>
                                      </div>
                                      <div class="col-md-6 col-12">
                                        <div class="form-group">
                                          <label for="city-column">Input Jam Selesai</label>
                                          <input type="time" id="city-column" value="{{$dt->jam_selesai}}" required="" class="form-control" name="jam_selesai" required>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary reset" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tutup</span>
                            </button>
                            <button type="submit" class="btn btn-primary submit">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
</div>
</div>

</section>
</div>


@endsection