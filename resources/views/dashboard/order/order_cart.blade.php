<h1>Order cart</h1>
<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>ID Article</th>
            <th>Nom Article</th>
            <th>Quantité</th>
            <th>PU</th>
            <th>PT</th>
        </tr>
    </thead>
    <tbody>
        @php($n=1)
        @foreach ($cart_items as $item)
            @php($article = $item->model)
            <tr>
                <td>{{ $n++ }}</td>
                <td>{{ $article->code }}</td>
                <td>{{ $article->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $article->unit_purchase_price }}</td>
                <td>{{ $item->quantity * $article->unit_purchase_pricce }}</td>
            </tr>
        @endforeach
    </tbody>
 </table>