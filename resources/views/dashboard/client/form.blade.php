

<x-dashboard-layout>
    <div class="form-container">

        <h1>{{ $client->exists ? "Modifier les informations sur le client" : "Ajouter un client" }}</h1>

        <form action=" {{ route( $client->exists ? "client.update" : "client.store", $client) }}" method="POST">
            @csrf
            @method($client->exists ? "PATCH" : "POST")

            @php
            $fields = [
                "name" => [
                    "label" => "Noms du client"
                ],
                "email" => [
                    "label" => "E-mail",
                    "type" => "email"
                ],
                "town" => [
                    "label" => "Ville",
                ],
                "country" => [
                    "label" => "Pays",
                ],
            ];
            @endphp

            @foreach ($fields as $name => $properties)
                @foreach ($properties as $key => $value)
                    @php($properties[$key] = $value)
                @endforeach

                @include("shared.input", array_merge(["name" => $name, "value" => $client->$name], $properties))
            @endforeach

            <div class="field-container">
                <button type="submit">{{ $client->exists ? "Mettre à jour" : "Ajouter" }}</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>