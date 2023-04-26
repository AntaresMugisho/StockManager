<x-dashboard-layout>
    
    <div class="stock-container">
        <div class="dashboard-heading">
            <h2 class="dashboard-heading-title">Suivie du stock</h2>
            <p class="dashboard-heading-description">Un oeil sur l'état des commandes</p>
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
                        <th>Qté commandée</th>
                        <th>Coût total</th>
                        <th>Date de commande</th>
                        <th>Date de livraison</th>
                        <th>Qté reçue</th>
                        <th>Validé</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php($n=0)
                    @forelse ($orders as $order)
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>{{ $order->code }}</td>
                        <td>{{ $order->supplier->name }}</td>
                        <td>{{ $order->orderedQuantity() }}</td>
                        <td>{{ $order->value() }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->delivered_at ?? "-" }}</td>
                        <td>{{ $order->deliveredQuantity() }}</td>
                        <td>{{ $order->validated() ? "Oui" : "Non" }}</td>
                        <td>
                            <a href="{{ route("order.edit", $order) }}">Voir</a>
                            <a href="{{ route("order.edit", $order) }}">Mettre à jour</a>
                            <form action="{{ route("order.destroy", $order) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>      
                    @empty
                        <tr>Empty</tr>    
                    @endforelse
                </tbody>
            </table>

            {{ $orders->links() }}
        </div>
    </div>
</x-dashboard-layout>