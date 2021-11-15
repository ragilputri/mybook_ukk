@extends('layout.landing-page')
@section('content')

<br><br><br>
<br><br><br>
<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="https://blogtechno.org/wp-content/uploads/2021/03/gambar-profil.jpg" alt="Admin" class="rounded-circle p-1 bg-secondary" width="110">
								<div class="mt-3">
									<h4>{{$data_user->name}}</h4>
								</div>
							</div>
							<hr class="my-4">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Nama</h6>
									<span class="text-secondary">{{$data_user->name}}</span>
								</li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Email</h6>
									<span class="text-secondary">{{$data_user->email}}</span>
								</li>
							</ul><br><br>
                            @if($data_user->account_status == "1")
                            <div class="d-grid gap-2 mx-auto">
                                <a href="/book" class="btn btn-info">DASHBOARD</a>
                            </div>
                            @endif
                            <br>
                            <div class="d-grid gap-2 mx-auto">
                                <a href="/logout" class="btn btn-danger">LOGOUT</a>
                            </div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
                            <h4>List Pinjaman</h4>
                            <ul class="list-group">
                            @foreach($data_pinjaman as $pinjaman)
                            @if($pinjaman->id_user == $data_user->id)
                                <li class="list-group-item">
                                    <table>
                                    <tr>
                                        <td>{{$pinjaman->judul}} &emsp;</td>
                                        <td class="badge bg-info text-dark">{{$pinjaman->status}}</td>
                                        @if($pinjaman->pernyataan == "Diterima")
                                            <td class="badge bg-success text-dark">{{$pinjaman->pernyataan}}</td>
                                        @elseif($pinjaman->pernyataan == "Ditolak")
                                            <td class="badge bg-danger text-dark">{{$pinjaman->pernyataan}}</td>
                                        @elseif($pinjaman->pernyataan == NULL)
                                            <td class="badge bg-secondary text-dark">Diproses</td>
                                        @endif
                                        <td>&emsp; {{$pinjaman->keterangan}}</td>
                                    </tr>
                                    </table>
                                </li>
                            @endif
                            @endforeach
                            </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
