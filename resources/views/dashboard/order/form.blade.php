

<x-dashboard-layout>
    <div class="form-container">

        <h1>{{ $order->exists ? "Modifier la commande" : "Passer une nouvelle commande" }}</h1>


        <form action=" {{ route("cart.store") }}" method="POST">
            @csrf
            @method($order->exists ? "PATCH" : "POST")
            
       
            <div class="form-block">
                <div class="field-container">
                    <label for="supplier">Fournisseur</label>
                    <select>
                        <option value="">Choisir...</option>
                        @foreach ($suppliers as $supplier)
                            <option name="supplier" id="supplier" value="value">{{ $supplier->code }} : {{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-block">
                <div class="field-container">
                    <label for="article">Article</label>
                    <select name="article" id="article">
                        <option value="">Choisir...</option>
                        @foreach ($articles as $article)
                            <option value="{{ $article->code}}">{{ $article->code}} : {{ $article->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field-container">
                    <label for="quantity">Quantité</label>
                    <input type="number" name="quantity" id="quantity" min=1>
                </div>
            </div>

            <div class="field-container">
                <button type="submit">Ajouter au panier</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>