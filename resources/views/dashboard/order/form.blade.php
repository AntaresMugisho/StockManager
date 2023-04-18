

<x-dashboard-layout>
    <div class="form-container">

        <h1>{{ $order->exists ? "Modifier la commande" : "Passer une nouvelle commande" }}</h1>

        <form action=" {{ route( $order->exists ? "order.update" : "order.store", $order) }}" method="POST">
            @csrf
            @method($order->exists ? "PATCH" : "POST")

            @php
            $fields = [
                "name" => [
                    "label" => "Article"
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
                @include("shared.input", array_merge(["name" => $name, "value" => $order->$name], $properties))
            @endforeach

            <div class="field-container">
                <button type="submit">{{ $order->exists ? "Mettre à jour" : "Créer" }}</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>