@extends('template.user')

@section('title')
    Cart
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/cart.css')}}"> 
@endsection

@section('content')
<div class="container">
    <!-- session sukses -->
    @if (Session::has('bisa'))
    <div class="alert alert-info" style="color: white;">
        {{ Session::get('bisa') }}
    </div>
    @endif
    <!-- session gagal -->
    @if (Session::has('nope'))
    <div class="alert alert-dark" style="color: red;">
        {{ Session::get('nope') }}
    </div>
    @endif
        @php
            $total = 0;    
        @endphp
    {{-- @if ($carts->count() == 0)
    <p style="text-align:center;">Your Cart is Empty</p>
    @else --}}
<div>
    <h3 style="text-align:center; font-weight:900;">{{ $carts->count() }} Barang Belannjaan Mu</h3>
</div>
<a href="/shop" class="btn btn-dark">Belanja Lagi</a>
<body>
    <style>
        body{
            background-color: pink;
            color: black;
        }
    </style>

@foreach ($carts as $cart)
<div class="cart">
    <div class="row">
        <div class="col-lg-3">
        <img class="img-cart" src="{{asset('storage/images/bird.png')}}" alt="">
        </div>
        <div class="col-lg-9">
            <div class="top">
                <p class="item-name">👻{{ $cart->product->name }}👻</p>
                <div class="top-right">
                    <p class="">IDR.{{number_format ($cart->product->price) }}</p>
                    <select style="background-color: transparent;" name="qty" class="quantity" data-item="{{ $cart->id }}">
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{$i}}"  {{ $cart->qty == $i ? 'selected': ''}}>{{$i}}</option>
                    @endfor
                    </select>
                    <!-- Subtotal -->
                    <p class="total-item">RpSubTotal : {{number_format ( $cart->product->price * $cart->qty ) }}</p>
                </div>
            </div>
            <hr class="mt-2 mb-2">
            <div class="bottom">
               <div class="row">
                    <p class="col-lg-6 item-desc" style="color: black;">
                        {{ $cart->product->desc }}
                    </p>
                    <div class="offset-lg-4">

                    </div>
                    <div class="col-lg-2">
                    <!-- delete cart -->
                    <form action="" method="POST">
                            @csrf
                            <button type="submit" class="d-inline btn btn-dark">Remove</button>
                        </form>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>
@php
$total += ($cart->product->price * $cart->qty);
@endphp
@endforeach
    {{-- @php
    $total += ($cart->item->price * $cart->quantity);
    @endphp --}}
<div class="totalz">
    <h4 class="total-price">Total Harga : {{number_format ( $total ) }}</h4>
</div>
</div>

<form action="/checkout" method="POST" style="margin-left: 700px;">
@csrf
<button type="submit" class="btn btn-primary">Checkout</button>
</form>
    {{-- @endif --}}
@endsection

@section('script')
</body>
<script type="text/javascript">
    (function(){
    const classname = document.querySelectorAll('.quantity');

    Array.from(classname).forEach(function(element){
     element.addEventListener('change', function(){
        const id = element.getAttribute('data-item');
        axios.patch(`/cart/${id}`, {
            quantity: this.value,
            id: id
          })
          .then(function (response) {
            //console.log(response);
            window.location.href = '/cart'
          })
          .catch(function (error) {
            console.log(error);
          });
   })
 })
    })();
</script>
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
@endsection