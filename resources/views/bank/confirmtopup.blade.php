@extends('layouts.admin')
@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-semibold">Daftar Permintaan Topup</h1>
        <a href="{{ route('bank.topup.new') }}" class="btn btn-primary btn-sm">Top Up Baru</a>
    </div>
    @if(session('message'))
    @if(is_array(session('message')) && count(session('message')) > 1)
    <div role="alert" class="alert {{ session('message')[0] }} mb-8" id="warning">
        <span>
           Berhasil Mengkonfirmasi TopUp
        </span>
    </div>
    @endif
    @endif

    <div class="overflow-x-auto">
        <table class="table table-zebra bg-white mb-8">
            <!-- head -->
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Order Id</th>
                    <th>Nama</th>
                    <th>Nominal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($topups as $key => $topup)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $topup->order_id }}</td>
                        <td>{{ $topup->user->name }}</td>
                        <td>{{ format_to_rp($topup->nominals) }}</td>
                        <td>
                            @if ($topup->status == 'confirmed')
                                Terkonfirmasi
                            @elseif($topup->status == 'unconfirmed')
                                Belum Dikonfirmasi
                            @elseif($topup->status == 'rejected')
                                Ditolak
                            @endif
                        </td>
                        <td class="flex gap-2">
                            @if($topup->status == "unconfirmed")
                            <form action="{{ route('bank.topup.store') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $topup->id }}" name="topup_id">
                                <input type="hidden" value="{{ $topup->user->id }}" name="user_id">
                                <input type="hidden" name="nominals" value="{{ $topup->nominals }}" >
                                <button type="submit" class="btn btn-success">Konfirmasi</button>
                            </form>
                            <form action="{{ route('bank.topup.reject') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $topup->id }}" name="topup_id">
                                <button type="submit" class="btn btn-error">Tolak</button>
                            </form>
                            @else
                              <button class="success p-2 text-white font-semibold flex items-center gap-2 rounded-md"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                              </svg> Sudah Dikonfimasi</button>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@push('script')
<script>
    setTimeout(() => {
        document.getElementById('warning').style.display = 'none';
    }, 5000);
</script>
@endpush
