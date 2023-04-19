

<x-dashboard-layout>
    <div class="form-container">

        <h1>{{ $order->exists ? "Modifier la commande" : "Passer une nouvelle commande" }}</h1>

        <form action=" {{ route( $order->exists ? "order.update" : "order.store", $order) }}" method="POST">
            @csrf
            @method($order->exists ? "PATCH" : "POST")
            

            //...


            <div class="field-container">
                <button type="submit">{{ $order->exists ? "Mettre à jour" : "Créer" }}</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>