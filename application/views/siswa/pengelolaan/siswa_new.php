
        <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Dashboard</span>
                <h3 class="page-title">Jadwal Pelaksanaan</h3>
              </div>
            </div>
            <!-- End Page Header -->

            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Jadwal Saat ini</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Jadwal</th>
                          <th scope="col" class="border-0">Dari Tanggal</th>
                          <th scope="col" class="border-0">Sampai Tanggal</th>
                          <th scope="col" class="border-0">Tanggal Tes</th>
                          <th scope="col" class="border-0">Jumlah Peserta</th>
                          <th scope="col" class="border-0">Biaya</th>
                          <th scope="col" class="border-0"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($schedule as $key => $sc)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$sc->schedule_name}}</td>
                          <td>{{date('d M, Y',strtotime($sc->start_date))}}</td>
                          <td>{{date('d M, Y',strtotime($sc->end_date))}}</td>
                          <td>{{date('d M, Y',strtotime($sc->test_date))}}</td>
                          <td>{{$sc->amount}}</td>
                          <td>Rp.{{number_format($sc->price)}}</td>
                          <td>

                            <button type="button" data-id="{{$sc->id}}"
                            @if ($sc->status_join!=false)
                                disabled
                            @endif
                            class="btn btn-success btn-schedule btn-sm">
                                @if($sc->status_join=='JOINED')
                                    TERDAFTAR
                                @elseif($sc->status_join=='FINISHED')
                                    SELESAI
                                @elseif($sc->status_join=='PENDING')
                                    PENDING
                                @else
                                    DAFTAR TES
                                @endif
                            </button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
          </div>