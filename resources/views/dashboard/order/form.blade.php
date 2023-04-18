<x-dashboard-layout>
    <div class="form-container">
        <h1>Passer une commande</h1>

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

        <form action="" method="POST">
            @csrf

            
            @foreach ($fields as $field)
                
                @include("shared.input", [
                    @foreach ($field as $key => $value)
                    {{ $key => $value }}
                    @endforeach
                ])
            @endforeach
     

            <div class="field-container">
                <label for="name">Nom de l'article</label>
                <input class="@error("name") is-invalid @enderror" name="name" id="name" value="{{ old("name") }}">
                
                @error("name")
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>
        
            <div class="field-container">
                <label for="description">Description</label>
                <textarea class="@error("description") is-invalid @enderror" name="description" id="description">{{ old("description") }}</textarea>
                
                @error("description")
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="field-container">
                <label for="unit_purchase_price">Prix d'achat unitaire</label>
                <input class="@error("unit_purchase_price") is-invalid @enderror" type="number" min="0" step="any" name="unit_purchase_price" id="unit_purchase_price" value="{{ old("unit_purchase_price") }}">
                
                @error("unit_purchase_price")
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>

            <div class="field-container">
                <label for="unit_selling_price">Prix de vente unitaire</label>
                <input class="@error("unit_selling_price") is-invalid @enderror" type="number" min="0" step="any" name="unit_selling_price" id="unit_selling_price" value="{{ old("unit_selling_price") }}">
                
                @error("unit_selling_price")
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="field-container">
                <label for="stock">Quantité en stock</label>
                <input class="@error("stock") is-invalid @enderror" type="number" min="0" step="any" name="stock" id="stock" value="{{ old("stock") }}">
                
                @error("stock")
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>

            <div class="field-container">
                <label for="minimum_stock">Stock minimum</label>
                <input class="@error("minimum_stock") is-invalid @enderror" type="number" min="0" step="any" name="minimum_stock" id="minimum_stock" value="{{ old("minimum_stock") }}">
                
                @error("minimum_stock")
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>

            <div class="field-container">
                <button type="submit">Créer</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>