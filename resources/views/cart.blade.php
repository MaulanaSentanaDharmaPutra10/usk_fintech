@extends('layouts.master')
@section('content')
   @if(count($transactions))
   <a href="{{ route('index') }}" class="btn btn-primary my-3">Kembali</a>
   <h1 class="font-semibold text-xl">Keranjangmu</h1>
   <div class="flex justify-between gap-8">
    <div class="grid grid-cols-1 gap-3 w-3/4">
        @foreach ($transactions as $transaction)
        <div class="card card-side h-fit bg-base-100 shadow-xl flex items-center" >
          <div class="w-[160px] h-[120px] overflow-hidden object-cover "><img class="object-cover ml-8" src="{{ $transaction->product->thumbnail }}"/></div>
          <div class="card-body">
            <h2 class="card-title">{{ $transaction->product->name }}</h2>
            <p>{{ format_to_rp($transaction->product->price) }} x {{ $transaction->quantity }}</p>
            <p class="text-xl font-semibold">{{ format_to_rp($transaction->total_price) }}</p>
            <div class="card-actions justify-end">
             <form action="{{ route('cart.delete', $transaction->id) }}" method="POST">
               @csrf
               @method('delete')
                <button type="submit" class="btn btn-error text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                  </svg></button>  
             </form>
            </div>
          </div>
        </div>
         @endforeach
     </div>
     <div class="pay w-1/4">
        <div class="title font-semibold text-xl">
            Total Price
        </div>
        <div class="shadow-xl w-full max-h-full p-8 bg-white mt-2 rounded-lg">
            <div class="price text-2xl font-semibold mb-4">
                {{ format_to_rp($total_prices_all) }}
            </div>
            <div class="button">
                <form action="{{ route('cart.pay') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $total_prices_all }}" name="total_prices">
                    <button type="submit" class="btn btn-primary w-full">
                        Pay Now
                    </button>
                </form>

            </div>
        </div>
     </div>

   </div>
   @else
   <h1 class="font-semibold text-xl mb-4">Keranjangmu Kosong</h1>
   <a href="{{ route('index') }}" class="btn btn-primary">Kembali</a>

   @endif



@endsection
