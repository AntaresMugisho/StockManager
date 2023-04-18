

<x-dashboard-layout>

    <div class="stock-container">
        <div class="dashboard-heading">
            <h2 class="dashboard-heading-title">Gestion des clients</h2>
            <p class="dashboard-heading-description">Un oeil sur les clients</p>
        </div>

        <a href="{{ route("client.create") }}">Ajouter un client</a>

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
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>{{ $client->code }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->town }}</td>
                        <td>{{ $client->country }}</td>
                        <td>
                            <a href="{{ route("client.show", $client)}}">Voir</a>
                            <a href="{{ route("client.edit", $client)}}">Modifier les informations</a>
                            <form action="{{ route("client.destroy", $client) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>          
                    @endforeach
                </tbody>
            </table>

            {{ $clients->links() }}
        </div>
    </div>
</x-dashboard-layout>