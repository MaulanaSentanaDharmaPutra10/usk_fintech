@extends('layouts.admin')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-semibold">Tarik Tunai Baru</h1>
    <a href="{{ route('bank.tariktunai') }}" class="btn btn-primary btn-sm">Kembali</a>
</div>
<div class="w-full bg-white p-8 rounded-md mt-8 mb-8">
    <form action="{{ route('bank.tariktunai.post') }}" method="POST" class="flex flex-col gap-4 w-full" enctype="multipart/form-data">
        @csrf
        <label for="">Nominal</label>
        <input required name="nominals" type="text" class="input input-bordered w-full" placeholder="Masukan Nominal">
        <select  required class="select select-bordered w-full" name="user">
            <option disabled selected>Pilih User Penerima</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ Str::ucfirst($user->name) }}</option>
            @endforeach
        </select>
         <button class="btn btn-primary mt-4">
            Submit
        </button>
    </form>
</div>



@endsection