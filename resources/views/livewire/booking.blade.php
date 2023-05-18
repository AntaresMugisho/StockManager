
<div class="form-container">

    <h1>Nouveau Booking</h1>

    @dump($order)

    <form action="{{ route("booking.store") }}" method="POST">
        @csrf
        <input type="radio" name="booking" id="inner_booking" value="inner_booking" wire:change="toggleBooking"/>
        <label for="inner_booking">Entrée</label>
        
        <input type="radio" name="booking" id="outer_booking" value="outer_booking" checked wire:change="toggleBooking"/>
        <label for="outer_booking">Sortie</label>
    
        @error("booking")
            <small>{{ $message }}</small>
        @enderror
{{--     
        @php
            $document = $innerBooking ? "order" : "invoice";
        @endphp --}}

        @if ($innerBooking)
            <label for="order">Commande N°</label>
            <select name="order" id="order" value="{{ old("order") }}" wire:change="updateOrder(1f)">
                <option value="">Choisir la commande...</option>
                @foreach ($orders as $order)
                    <option value="{{ $order->code }}" {{ old("order") == $order->code ? "selected" : null }}>{{ $order->code . " : " . $order->supplier->name }}</option>
                @endforeach
            </select>

            @error("order")
                <small>{{ $message }}</small>
            @enderror

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
        @endif
    
        <div class="field-container">
            <button type="submit">{{ $innerBooking ? "Inventorier" : "Ajouter"}}</button>
        </div>
    </form>
</div>