<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $store }}</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: system-ui, sans-serif; margin: 0; background: #f5f6f8; color: #222; }
        header { background: #1f2937; color: #fff; padding: 20px 32px; }
        header h1 { margin: 0; font-size: 24px; }
        header small { color: #9ca3af; }
        main { max-width: 1000px; margin: 32px auto; padding: 0 16px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; }
        .card { background: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 1px 4px rgba(0,0,0,.08); }
        .card h3 { margin: 0 0 8px; font-size: 18px; }
        .price { color: #059669; font-weight: 700; font-size: 18px; }
        .empty { text-align: center; padding: 60px 0; color: #6b7280; }
    </style>
</head>
<body>

    <header>
        <h1>{{ $store }}</h1>
        <small>{{ request()->getHost() }}</small>
    </header>

    <main>
        <h2>Products ({{ $products->count() }})</h2>

        @forelse ($products as $product)
            @if ($loop->first)
                <div class="grid">
            @endif

            <div class="card">
                <h3>{{ $product->name }}</h3>
                <div class="price">${{ number_format($product->price, 2) }}</div>
            </div>

            @if ($loop->last)
                </div>
            @endif
        @empty
            <div class="empty">This store has no products yet.</div>
        @endforelse
    </main>

</body>
</html>