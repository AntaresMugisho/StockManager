<x-dashboard-layout>
    <div class="form-container">

        {{-- @php
        $article_exists = $article->exists
        @endphp --}}

        <h1>{{ $article->exists ? "Modifier l'article" : "Créer un nouvel article" }}</h1>

        <form action=" {{ route( $article->exists ? "article.update" : "article.store", $article) }}" method="POST">
            @csrf
            @method($article->exists ? "PATCH" : "POST")

            @php
            $fields = [
                "name" => [
                    "label" => "Nom de l'article"
                ],
                "description" => [
                    "label" => "Description",
                    "type" => "textarea"
                ],
                "unit_purchase_price" => [
                    "label" => "Prix d'achat unitaire",
                    "type" => "number"
                ],
                "unit_selling_price" => [
                    "label" => "Prix de vente unitaire",
                    "type" => "number"
                ],
                "stock" => [
                    "label" => "Quantité en stock",
                    "type" => "number"
                ],
                "minimum_stock" => [
                    "label" => "Stock minimum",
                    "type"  => "number"
                ],
            ];
            @endphp

            @foreach ($fields as $name => $properties)
                @foreach ($properties as $key => $value)
                    @php($properties[$key] = $value)
                @endforeach
                @include("shared.input", array_merge(["name" => $name, "value" => $article->$name], $properties))
            @endforeach

            <div class="field-container">
                <button type="submit">{{ $article->exists ? "Mettre à jour" : "Créer" }}</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>