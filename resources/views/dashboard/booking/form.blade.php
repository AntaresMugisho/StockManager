

<x-dashboard-layout>
    <div class="form-container">

        <h1>Nouveau mouvement</h1>
        <form action=" {{ route("booking.store") }}" method="POST">
            @csrf
            <div class="">
                <p>Type de mouvement</p>
                <div class="field-cont">

                    <input type="radio" name="booking" id="outer_booking" value="outer_booking" checked>
                    <label for="outer_booking">Sortie</label>

                    <input type="radio" name="booking" id="inner_booking" value="inner_booking">
                    <label for="inner_booking">Entrée</label>

                    @error("booking")
                        <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="order-display">
                <div class="order-info">
                    <label for="order">Commande : </label>
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
            </div>

            <div class="invoice-display">
                <p>Infos facture</p>
            </div>

            <div class="field-container">
                <button type="submit">Inventorier</button>
            </div>
        </form>
    </div>

    <script>
        let inner = document.querySelector("#inner_booking")
        let outer = document.querySelector("#outer_booking")
        let orderDisplay = document.querySelector(".order-display")
        let invoiceDisplay = document.querySelector(".invoice-display")

        inner.addEventListener("change", () => {
            orderDisplay.style.display = ""
            invoiceDisplay.style.display = "none"
        })
        outer.addEventListener("change", () => {
            orderDisplay.style.display = "none"
            invoiceDisplay.style.display = ""
        })
    </script>
</x-dashboard-layout>