<x-dashboard-layout>

    <div class="stock-container">
        <div class="dashboard-heading">
            <h2 class="dashboard-heading-title">Suivie du stock</h2>
            <p class="dashboard-heading-description">Un oeil sur l'état des orders en stock</p>
        </div>

        
        <a href="{{ route("order.create") }}">Passer une commande</a>

        @if (session("success"))
            <div class="alert alert-success">{{ session("success") }}</div>
        @endif

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>ID</th>
                        <th>Fournisseur</th>
                        <th>Date de commande</th>
                        <th>Date de livraison</th>
                        <th>Quantité</th>
                        <th>Coût total</th>
                        <th>Validé</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php($n=1)
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>{{ $order->code }}</td>
                        <td>{{ $order->supplier->name }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->delivered_at ?? "-"}}</td>
                        {{-- <td>{{ $order->quantity }}</td> --}}
                        <td>{{ "Non"}}</td>
                        <td>{{ $order->cost }}</td>
                        <td>
                            <a href="{{ route("order.edit", $order)}}">Voir</a>
                            <a href="{{ route("order.edit", $order)}}">Mettre à jour</a>
                            <form action="{{ route("order.destroy", $order) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>          
                    @endforeach
                </tbody>
            </table>

            {{ $orders->links() }}
        </div>
    </div>
</x-dashboard-layout>