
<div class="form-container">

    <h1>Nouveau Booking</h1>

    @if(session("warning"))
        <div class="alert alert-danger">{{ session("warning") }}</div>
    @endif

    @if(session("success"))
        <div class="alert alert-succes">{{ session("success") }}</div>
    @endif
    
    <form action="{{ route("booking.store") }}" method="POST">
        @csrf
        <input type="radio" name="booking" id="inner_booking" value="inner_booking" wire:change="toggleBooking($event.target.value)"/>
        <label for="inner_booking">Entrée</label>
        
        <input type="radio" name="booking" id="outer_booking" value="outer_booking" checked wire:change="toggleBooking($event.target.value)"/>
        <label for="outer_booking">Sortie</label>
    
        @error("booking")
            <small>{{ $message }}</small>
        @enderror
        
        @if ($innerBooking)
            <label for="order">Commande N°</label>
            <select name="order" id="order" value="{{ old("order") }}" required wire:change="updateOrder($event.target.value)">
                <option value="">Choisir la commande...</option>

                @foreach ($orders as $ord)
                <option value="{{ $ord->code }}" {{ old("order") == $ord->code ? "selected" : null }}>{{ $ord->code . " : " . $ord->supplier->name }}</option>
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
                    {{-- Order is being updated on selection change --}}
                    @foreach ($order->articles as $article)
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>{{ $article->code }}</td>
                        <td>{{ $article->name }}</td>
                        <td>{{ $article->ordered_quantity }}</td>
                        <td><input type="number" min="0" placeholder="0" name="{{ $article->code }}" id="{{ $article->code }}" value="{{ old($article->code, $article->delivered_quantity) }}" aria-label="Quantité reçue"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
        {{-- Will start by here the next time --}}
        {{-- @else
            <label for="article">Client</label>
            <select name="article" id="article" value="{{ old("article") }}" required wire:change="updateArticle($event.target.value)">
                <option value="">Choisir la commande...</option>

                @foreach ($orders as $ord)
                <option value="{{ $ord->code }}" {{ old("order") == $ord->code ? "selected" : null }}>{{ $ord->code . " : " . $ord->supplier->name }}</option>
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
                    {{-- Order is being updated on selection change --}}
                    @foreach ($order->articles as $article)
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>{{ $article->code }}</td>
                        <td>{{ $article->name }}</td>
                        <td>{{ $article->ordered_quantity }}</td>
                        <td><input type="number" min="0" placeholder="0" name="{{ $article->code }}" id="{{ $article->code }}" value="{{ old($article->code, $article->delivered_quantity) }}" aria-label="Quantité reçue"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                

        @endif --}}
    
        <div class="field-container">
            <button type="submit">{{ $innerBooking ? "Enregistrer" : "Ajouter"}}</button>
        </div>
    </form>
</div>