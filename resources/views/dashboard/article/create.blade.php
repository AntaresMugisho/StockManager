<x-dashboard-layout>
    <div class="form-container">
        <h1>Créer un nouvel article</h1>

        <form action=" {{ route("article.store") }}" method="POST">
            @csrf

            <div class="field-container">
                <label for="name">Nom de l'article</label>
                <input type="text" name="name" id="name" value="{{ old("name") }}">
            </div>

            <div class="field-container">
                <label for="description">Description</label>
                <textarea name="description" id="description">{{ old("description") }}</textarea>
            </div>
            
            <div class="field-container">
                <label for="unit_purchase_price">Prix d'achat unitaire</label>
                <input type="number" min="0" step="any" name="unit_purchase_price" id="unit_purchase_price" value="{{ old("unit_purchase_price") }}">
            </div>

            <div class="field-container">
                <label for="unit_selling_price">Prix de vente unitaire</label>
                <input type="number" min="0" step="any" name="unit_selling_price" id="unit_selling_price" value="{{ old("unit_selling_price") }}">
            </div>
            
            <div class="field-container">
                <label for="stock">Quantité en stock</label>
                <input type="number" min="0" step="any" name="stock" id="stock" value="{{ old("stock") }}">
            </div>

            <div class="field-container">
                <label for="minimum_stock">Stock minimum</label>
                <input type="number" min="0" step="any" name="minimum_stock" id="minimum_stock" value="{{ old("minimum_stock") }}">
            </div>

            <div class="field-container">
                <button type="submit">Créer</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>