<!DOCTYPE html>
<html>
<head>
    <title>Carrito</title>
</head>
<body style="margin:0; font-family:Arial; background:#f3f3f3;">

    <div style="background:#131921; padding:15px; color:white;">
        <h2 style="margin:0;">🛒 Mi Carrito</h2>
        <a href="{{ route('shop') }}" 
           style="color:#ff9900; text-decoration:none;">
            Volver a la tienda
        </a>
    </div>

    <div style="padding:40px;">

        @php $total = 0; @endphp

        @if(session('cart') && count(session('cart')) > 0)

            @foreach(session('cart') as $id => $details)

                @php 
                    $subtotal = $details['price'] * $details['quantity'];
                    $total += $subtotal;
                @endphp

                <div style="background:white; padding:20px; margin-bottom:20px; 
                            border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">

                    <h3>{{ $details['name'] }}</h3>

                    <p>Precio: ${{ number_format($details['price']) }}</p>
                    <p>Cantidad: {{ $details['quantity'] }}</p>
                    <p><strong>Subtotal: ${{ number_format($subtotal) }}</strong></p>

                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            style="background:red; color:white; border:none;
                                   padding:8px 15px; border-radius:5px; cursor:pointer;">
                            Eliminar
                        </button>
                    </form>

                </div>

            @endforeach

            <div style="background:white; padding:20px; border-radius:8px;
                        box-shadow:0 2px 8px rgba(0,0,0,0.1);">

                <h2>Total: ${{ number_format($total) }}</h2>

            </div>

        @else

            <h3>Tu carrito está vacío 😢</h3>

        @endif

    </div>

</body>
</html>