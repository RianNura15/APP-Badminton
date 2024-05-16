<div class="modal fade" id="batal{{$dt->id_sewa}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Batalkan
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
                </button>
            </div>
            <form class="form form-vertical" method="GET" action="{{route('batal', $dt->id_sewa)}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <h4 class="card-title">No. Transaksi : TRS-{{$dt->id_sewa}}</h4>
                            <h4 class="card-title">Lapangan : {{$dt->nama_lapangan->nama_lap}}</h4>
                            <h4 class="card-title">Tanggal : {{$dt->tanggal}}</h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-outline-danger form-control rounded-pill mt-4" style="margin-top: -50px;" onclick="return confirm('Yakin Akan Dibatalkan?')"> <i class="icon dripicons-document-edit"></i> Batalkan</button>
                </div>
            </form>
        </div>
    </div>
</div>