<x-dashboard-layout>
    
    <div class="stock-container">
        <div class="dashboard-heading">
            <h2 class="dashboard-heading-title">Suivie des factures</h2>
            <p class="dashboard-heading-description">Un oeil sur l'état des factures</p>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>ID</th>
                        <th>Client</th>
                        <th>ID Client</th>
                        <th>Total</th>
                        <th>Remise</th>
                        <th>Payé</th>
                        <th>Solde</th>
                        <th>Statut</th>
                        {{-- <th>Actions</th> --}} {{-- We should not be able to permor actions on invoice
                                                    to prevent falsification as it's automatically 
                                                    calculated and generated by the programm --}}
                    </tr>
                </thead>
                <tbody>
                    @php($n=1)
                    @forelse ($invoices as $invoice)
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>{{ $invoice->code }}</td>
                        <td>{{ $invoice->client->name }}</td>
                        <td>{{ $invoice->client->code }}</td>
                        <td>{{ $invoice->total }} $</td>
                        <td>{{ $invoice->discount }}</td>
                        <td>{{ $invoice->paid }} $</td>
                        <td>{{ $invoice->balance }}</td>
                        <td>{{ $invoice->status }}</td>
                        {{-- <td>
                            <a href="{{ route("invoice.show", $invoice) }}">Voir</a>
                            <a href="{{ route("invoice.edit", $invoice) }}">Mettre à jour</a>
                            <form action="{{ route("invoice.destroy", $invoice) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit">Supprimer</button>
                            </form>
                        </td> --}}
                    </tr>      
                    @empty
                        <tr>Empty</tr>    
                    @endforelse
                </tbody>
            </table>

            {{ $invoices->links() }}
        </div>
    </div>
</x-dashboard-layout>