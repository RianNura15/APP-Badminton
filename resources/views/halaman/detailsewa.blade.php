                    <div class="modal fade" id="edit{{$dt->id_sewa}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Detail Data
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-3">Nama </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{Auth::user()->name}} </div>
                                <div class="col-3">Lapangan </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$dt->nama_lapangan->nama_lap}} - {{$dt->nama_lapangan->nama_jenis}} </div>
                                <div class="col-3">Ke Rekening </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$dt->payment->no_rek}} - {{$dt->payment->nama_rek}} </div>
                                <div class="col-3">Harga </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> Rp {{number_format($dt->hargasewa,0,",",".")}} </div>
                                <div class="col-3">Tanggal </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{ \Carbon\Carbon::parse($dt->tanggal)->format('d F Y') }} </div>
                                <div class="col-3">Konfirmasi </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> 
                                    @if($dt->konfirmasi=="Belum di Konfirmasi")
                                    <span class="badge bg-warning">{{$dt->konfirmasi}}</span>
                                    @endif
                                    @if($dt->konfirmasi=="Sudah di Konfirmasi")
                                    <span class="badge bg-success">{{$dt->konfirmasi}}</span>
                                    @endif
                                    @if($dt->konfirmasi=="Batal")
                                    <span class="badge bg-danger">{{$dt->konfirmasi}}</span>
                                    @endif
                                </div>
                                <div class="col-3">Keterangan </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> 
                                    @if($dt->bukti_tf=="-" && $dt->keterangan!=='Di Batalkan' && $dt->tempo==\Carbon\Carbon::parse($dt->tempo)->locale('id')->diffForHumans() <= $dt->tempo && $dt->bukti_tf=='-')
                                    <span class="badge bg-danger">Segera Upload Bukti Transfer ke Rekening</span>
                                    @endif
                                    @if($dt->keterangan=="Aktif")
                                    @if($dt->bukti_tf!=="-")
                                    <span class="badge bg-primary">
                                        {{$dt->keterangan}}
                                    </span>
                                    @endif
                                    @endif
                                    @if($dt->keterangan=='Selesai')
                                    <span class="badge bg-success">{{$dt->keterangan}}</span>
                                    @endif
                                    @if($dt->keterangan=='Di Batalkan')
                                    <span class="badge bg-danger">{{$dt->keterangan}}</span>
                                    @endif
                                    @if($dt->keterangan=='Sedang di Cek')
                                    <span class="badge bg-warning">{{$dt->keterangan}}</span>
                                    @endif
                                    @if($dt->tempo==\Carbon\Carbon::parse($dt->tempo)->locale('id')->diffForHumans() >= $dt->tempo && $dt->bukti_tf=="-")
                                    <span class="badge bg-danger">Expired</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>