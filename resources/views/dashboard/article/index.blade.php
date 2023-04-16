<x-dashboard-layout>

    <div class="stock-container">
        <div class="dashboard-heading">
            <h2 class="dashboard-heading-title">Suivie du stock</h2>
            <p class="dashboard-heading-description">Un oeil sur l'état des articles en stock</p>
        </div>

        
        <a href="{{ route("article.create") }}">Ajouter un article</a>

        @if (session("status") === "article-stored")
            <div class="alert alert-success">L'article a été créé avec succès !</div>
        @endif

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>PAU</th>
                        <th>PVU</th>
                        <th>Stock</th>
                        <th>Minimum</th>
                        <th>Valeur du stock</th>
                        <th>Bénéfice attendu</th>
                        <th>Actif</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php($n=1)
                    @foreach ($articles as $article)
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>{{ $article->code }}</td>
                        <td>{{ $article->name }}</td>
                        <td>{{ $article->description }}</td>
                        <td class="currency">{{ $article->unit_purchase_price }} $</td>
                        <td class="currency">{{ $article->unit_selling_price }} $</td>
                        <td>{{ $article->stock }}</td>
                        <td>{{ $article->minimum_stock }}</td>
                        <td class="currency">{{ $article->stock *  $article->unit_selling_price }} $</td>
                        <td class="currency">{{ ($article->stock *  $article->unit_selling_price) - ($article->stock *  $article->unit_purchase_price) }} $</td>
                        <td>{{ $article->stock > 0 ? "Oui" : "Non" }}</td>
                        <td>
                            <a href="{{ route("article.edit", $article)}}">Mettre à jour</a>
                            <form action="{{ route("article.destroy", $article) }} method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>          
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>