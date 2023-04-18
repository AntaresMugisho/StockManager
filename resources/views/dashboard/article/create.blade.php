<x-dashboard-layout>
    <div class="form-container">
        <h1>Créer un nouvel article</h1>

        <form action=" {{ route("article.store") }}" method="POST">
            @csrf

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
                    "label" => "Prix de vente unitaire",
                    "type"  => "number"
                ],
            ];
            @endphp

            @foreach ($fields as $name => $properties)
                @foreach ($properties as $key => $value)
                    @php($properties[$key] = $value)
                @endforeach
                @include("shared.input", array_merge(["name" => $name], $properties))
            @endforeach

            <div class="field-container">
                <button type="submit">Créer</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>