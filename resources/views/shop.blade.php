<!DOCTYPE html>
<html>
<head>
    <title>Tienda</title>
</head>
<body style="margin:0; font-family:Arial; background:#f3f3f3;">

    <div style="background:#131921; padding:15px; color:white;">
        <h2 style="margin:0;">🛒 Mi Tienda</h2>
        <a href="{{ route('cart.view') }}" 
           style="color:#ff9900; text-decoration:none;">
            Ver carrito
        </a>
    </div>

    <div style="padding:40px;">
        <h1>Productos</h1>

        <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:20px;">

            @foreach($products as $product)
                <div style="background:white; padding:20px; border-radius:8px; 
                            box-shadow:0 2px 8px rgba(0,0,0,0.1);">

                    <h3>{{ $product->name }}</h3>

                    <p style="font-size:18px; font-weight:bold;">
                        ${{ number_format($product->price) }}
                    </p>

                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            style="background:#ff9900; border:none; padding:10px;
                                   width:100%; border-radius:5px; cursor:pointer;">
                            Agregar al carrito
                        </button>
                    </form>

                </div>
            @endforeach

        </div>
    </div>

</body>
</html>


