@extends('layouts.master')
@section('content')
    <div class="flex lg:flex-row flex-col gap-4 justify-between">
        <div class="welcome-text">
            <p class="text-xl">Selamat Datang Kembali 
                @if(Auth::check())
                   {{Auth::user()->name}}
                @else
                   Di Fintech
                @endif
            </p>
            <h1 class="font-semibold text-xl">Pilih Product Menarik</h1>
        </div>
        @if (Auth::user())
            <div class="wallets-balance flex gap-2 items-center">
                <a href="{{ route('tarik.tunai') }}"
                class="topup  bg-blue-500 h-full flex flex-col items-center p-4 text-white rounded-lg font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1z"/>
                    <path fill-rule="evenodd" d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708z"/>
                  </svg>
                Tarik Tunai
                </a>
                <a href="{{ route('topup.index') }}"
                    class="topup  bg-blue-500 h-full flex flex-col items-center p-4 text-white rounded-lg font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z" />
                    </svg>
                    Top Up
                </a>
                <div class="wallets bg-gradient-to-r from-blue-500 to-blue-700 py-4 px-8 rounded-lg text-white font-bold">
                    <p class="font-normal">Saldo Anda</p>
                    <p>{{ format_to_rp(Auth::user()->wallet->credit) }}</p>
                </div>
            </div>
        @endif
    </div>


    <div class="product-list mt-8 lg:mt-16">
        <select class="select w-full max-w-xs mb-8" id="select_category">
            <option disabled selected>Pilih Kategori Produk</option>
            <option value="all">
                Semua Kategori
            </option>
            @foreach ($categories as $category )
              <option id="{{ $category->id }}" value="{{ $category->id }}">
                {{ $category->name }}
              </option>
            @endforeach
          </select>
        <div class="grid grid-cols-1 lg:grid-cols-4 w-full gap-5">
            @foreach ($products as $key => $product)
                <div class="card bg-base-100 shadow-xl">
                    <figure class="h-[170px] overflow-hidden object-cover"><img class="object-cover"
                            src="{{ $product->thumbnail }}" alt="Shoes" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">{{ $product->name }}</h2>
                        <p>{{ $product->description }}</p>
                        <h2 class="card-title">{{ format_to_rp($product->price) }}</h2>
                        <div class="card-actions justify-end">
                            <form action="{{ route('cart.add') }}" method="POST" class="card-actions justify-end h-full">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <input value="1" min="1" name="quantity" type="number"
                                    class="shadow-lg border-[1.5px] border-slate-300 h-full w-12 pl-2 rounded-lg">
                                <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-cart"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg></button>

                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if (session('message'))
        @if (is_array(session('message')) && count(session('message')) > 1)
            <div class="toast toast-end toast-bottom" id="warning">
                <div class="alert alert-{{ session('message')[0] }}">
                    {{ session('message')[1] }}
                </div>
            </div>
        @endif
    @endif


    @push('script')
        <script>
            setTimeout(() => {
                document.getElementById('warning').style.display = 'none';
            }, 5000);
        </script>
    @endpush
@endsection
