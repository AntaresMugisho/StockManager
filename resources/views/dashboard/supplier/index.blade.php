

<x-dashboard-layout>

    <div class="stock-container">
        <div class="dashboard-heading">
            <h2 class="dashboard-heading-title">Gestion des fournisseurs</h2>
            <p class="dashboard-heading-description">Un oeil sur les fournisseurs</p>
        </div>

        <a href="{{ route("supplier.create") }}">Ajouter un fournisseur</a>

        @if (session("success"))
            <div class="alert alert-success">{{ session("success") }}</div>
        @endif

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>ID</th>
                        <th>Noms</th>
                        <th>E-mail</th>
                        <th>Ville</th>
                        <th>Pays</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php($n=1)
                    @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>{{ $supplier->code }}</td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->town }}</td>
                        <td>{{ $supplier->country }}</td>
                        <td>
                            <a href="{{ route("supplier.show", $supplier)}}">Voir</a>
                            <a href="{{ route("supplier.edit", $supplier)}}">Modifier les informations</a>
                            <form action="{{ route("supplier.destroy", $supplier) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>          
                    @endforeach
                </tbody>
            </table>

            {{ $suppliers->links() }}
        </div>
    </div>
</x-dashboard-layout>