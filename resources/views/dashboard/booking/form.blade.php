

<x-dashboard-layout>
    <div class="form-container">

        <h1>Nouveau mouvement</h1>

        <form action=" {{ route("booking.store") }}" method="POST">
            @csrf
            
            <div class="">
                <p>Type de mouvement</p>
                <div class="field-container">
                    <input type="radio" name="booking" id="inner_booking" value="inner_booking" checked>
                    <label for="inner">Entrée</label>

                    <input type="radio" name="booking" id="outer_booking" value="outer_booking">
                    <label for="inner">Sortie</label>

                    @error("booking")
                        <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>

            {{-- If inner is checked --}}
            <p>En cas d'entrée</p>

            
            <div class="field-containr">
                <label for="order">Commande</label>
                <select name="order" id="order" value="{{ old("order") }}">
                    <option value="">Choisir la commande concernée...</option>
                    @foreach ($orders as $order)
                    <option value="{{ $order->code }}" {{ old("order") == $order->code ? "selected" : null }}>{{ $order->code . " : " . $order->supplier->name }}</option>
                    @endforeach
                </select>
                @error("order")
                <small>{{ $message }}</small>
                @enderror
            </div>
            
            

           <table class="inner-checked">
               
               <thead>
                   <tr>
                        <th>N°</th>
                        <th>ID Article</th>
                        <th>Nom</th>
                        <th>Quantité commandée</th>
                        <th>Quantité reçue</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $n=1;
                    @endphp
                    @foreach ($order->articles as $article)
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>{{ $article->code }}</td>
                        <td>{{ $article->name }}</td>
                        <td>{{ $article->ordered_quantity }}</td>
                        <td><input type="number" min="0" placeholder="0" name="{{ $article->code }}" id="{{ $article->code }}" value="{{ old($article->code, $article->delivered_quantity) }}"></td>
                    </tr>
                    @endforeach
                </tbody>
           </table>

            <div class="field-container">
                <button type="submit">Inventorier</button>
            </div>
        </form>


        {{-- Order cart
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
                    $cartItems = Cart::instance("order")->content();
                    $n = 1;
                @endphp
                @forelse ($cartItems as $item)
                    @php($article = $item->model)
                    <tr>
                        <td>{{ $n++  }}</td>
                        <td>{{ $article->code }}</td>
                        <td>{{ $article->name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $article->unit_purchase_price }} $</td>
                        <td>{{ $item->qty * $article->unit_purchase_price }} $</td>
                        <td>
                            <form action="{{ route("order.cart.destroy", $item->rowId) }}" method="POST">
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
        </form> --}}
    </div> 
</x-dashboard-layout>