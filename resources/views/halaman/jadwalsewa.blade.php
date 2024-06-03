<div class="modal fade" id="jadwal{{$dt->id_sewa}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Jadwal TRS-{{$dt->id_sewa}}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                    ✖
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <h4 class="card-title">Informasi</h4>
                        <div style="width: 100%; overflow-x: auto;">
                            <table style="width: 100%; text-align: left; border-collapse: collapse;">
                                <tr style="display: flex; justify-content: space-between;">
                                    <td style="flex: 1; min-width: 100px; padding: 5px;">Nama Lapangan</td>
                                    <td style="flex: 0; min-width: 10px; padding: 5px;">:</td>	
                                    <td style="flex: 2; min-width: 150px; padding: 5px;">{{$dt->nama_lapangan->nama_lap}}</td>
                                </tr>
                                <tr style="display: flex; justify-content: space-between;">
                                    <td style="flex: 1; min-width: 100px; padding: 5px;">Nama Sewa / Klub</td>
                                    <td style="flex: 0; min-width: 10px; padding: 5px;">:</td>	
                                    <td style="flex: 2; min-width: 150px; padding: 5px;">{{$dt->namapb}}</td>
                                </tr>
                                <tr style="display: flex; justify-content: space-between;">
                                    <td style="flex: 1; min-width: 100px; padding: 5px;">Tanggal Main</td>
                                    <td style="flex: 0; min-width: 10px; padding: 5px;">:</td>	
                                    <td style="flex: 2; min-width: 150px; padding: 5px;">{{ \Carbon\Carbon::parse($dt->data_jadwal->tanggalmain)->format('d F Y') }}</td>
                                </tr>
                                <tr style="display: flex; justify-content: space-between;">
                                    <td style="flex: 1; min-width: 100px; padding: 5px;">Jam Main</td>
                                    <td style="flex: 0; min-width: 10px; padding: 5px;">:</td>	
                                    <td style="flex: 2; min-width: 150px; padding: 5px;">{{ \Carbon\Carbon::parse($dt->data_jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($dt->data_jadwal->jam_selesai)->format('H:i') }} WIB</td>
                                </tr>
                                <tr style="display: flex; justify-content: space-between;">
                                    <td style="flex: 1; min-width: 100px; padding: 5px;">Total Jam</td>
                                    <td style="flex: 0; min-width: 10px; padding: 5px;">:</td>	
                                    <td style="flex: 2; min-width: 150px; padding: 5px;">{{$jam}} Jam</td>
                                </tr>
                                <tr style="display: flex; justify-content: space-between;">
                                    <td style="flex: 1; min-width: 100px; padding: 5px;">Keterangan</td>
                                    <td style="flex: 0; min-width: 10px; padding: 5px;">:</td>	
                                    <td style="flex: 2; min-width: 150px; padding: 5px;">
                                        @if($dt->data_jadwal->keterangan == 'Pending')
                                            <span class="badge bg-warning">{{$dt->data_jadwal->keterangan}}</span>
                                        @endif
                                        @if($dt->data_jadwal->keterangan == 'Aktif')
                                            <span class="badge bg-primary">{{$dt->data_jadwal->keterangan}}</span>
                                        @endif
                                        @if($dt->data_jadwal->keterangan == 'Selesai')
                                            <span class="badge bg-success">{{$dt->data_jadwal->keterangan}}</span>
                                        @endif
                                        @if($dt->data_jadwal->keterangan == 'Di Batalkan Admin' || $dt->data_jadwal->keterangan == 'Di Batalkan Pelanggan')
                                            <span class="badge bg-danger">{{$dt->data_jadwal->keterangan}}</span>
                                        @endif
                                        @if($dt->data_jadwal->keterangan == 'Expired')
                                            <span class="badge bg-danger">{{$dt->data_jadwal->keterangan}}</span>
                                        @endif
                                        @if($dt->data_jadwal->keterangan == 'Hanya DP')
                                            <span class="badge bg-danger">{{$dt->data_jadwal->keterangan}}</span>
                                        @endif
                                        @if($dt->data_jadwal->keterangan == 'Mulai')
                                            <span class="badge bg-info">{{$dt->data_jadwal->keterangan}}</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>