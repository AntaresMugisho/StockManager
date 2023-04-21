

<x-dashboard-layout>
    <div class="form-container">

        <h1>Passer une nouvelle commande </h1>

        <form action=" {{ route("cart.store") }}" method="POST">
            @csrf
            
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


        {{-- Order cart --}}
        @if (session("success"))
            <div class="alert alert-success">{{ session("success") }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>ID Article</th>
                    <th>Nom Article</th>
                    <th>Quantité</th>
                    <th>PU</th>
                    <th>PT</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $cartItems = Cart::content();
                    $n = 1;
                @endphp
                @forelse ($cartItems as $item)
                    @php($article = $item->model)
                    <tr>
                        <td>{{ $n++  }}</td>
                        <td>{{ $article->code }}</td>
                        <td>{{ $article->name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $article->unit_purchase_price }}</td>
                        <td>{{ $item->qty * $article->unit_purchase_price }} $</td>
                        <td>
                            <form action="{{ route("cart.destroy", $item->rowId) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit">Retirer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Aucun articlé commandé</td>
                    </tr>
                @endforelse
            </tbody>
         </table>

        <form action="{{route("order.store")}}" class="" method="POST">
            @csrf
         
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
        
            <div class="field-container">
                <button type="submit">Sauvegarder la commande</button></div>
        </form>
    </div>
</x-dashboard-layout>