

<x-dashboard-layout>
    <div class="form-container">

        <h1>Passer une nouvelle commande </h1>

        <form action=" {{ route("cart.store") }}" method="POST">
            @csrf
            
            <div class="form-block">
                <div class="field-container">
                    <label for="supplier">Fournisseur</label>

                    <select name="supplier" id="supplier">
                        <option value="">Choisir...</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->code }}" {{ old("supplier") == $supplier->code ? "selected" : "" }}>
                                {{ $supplier->code }} : {{ $supplier->name }}
                            </option>
                        @endforeach
                    </select>

                    @error("supplier")
                        <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-block">
                
                <div class="field-container">
                    <label for="article">Article</label>

                    <select name="article" id="article">
                        <option value="">Choisir...</option>
                        @foreach ($articles as $article)
                            <option value="{{ $article->code }}" {{ old("article") == $article->code ? "selected" : "" }}>{{ $article->code}} : {{ $article->name }}</option>
                        @endforeach
                    </select>

                    @error("article")
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="field-container">
                    <label for="quantity">Quantité</label>
                    <input type="number" name="quantity" id="quantity">
                    @error("quantity")
                        <small>{{ $message }}</small>
                    @enderror
                </div>

            </div>

            <div class="field-container">
                <button type="submit">Ajouter au panier</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>