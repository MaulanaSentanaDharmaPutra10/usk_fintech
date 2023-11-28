@extends('layouts.master')
@section('content')
<a href="{{ route('index') }}" class="btn btn-outline btn-sm mb-8">
    Kembali
 </a>
   <h1 class="font-bold text-xl">Top Up</h1>
   <form action="{{ route('topup.proceed') }}" class="flex flex-col items-center mt-4 gap-2" method="POST">
    @csrf
    <input required name="nominal" type="text" class="input input-bordered w-full" placeholder="Masukan Nominal">
    <button type="submit" class="btn btn-primary w-full mt-2">Top Up</button>
</form>
@endsection
