

<x-dashboard-layout>
    <div class="form-container">

        <h1>{{ $supplier->exists ? "Modifier les informations sur le fournisseur" : "Ajouter un fournisseur" }}</h1>

        <form action=" {{ route( $supplier->exists ? "supplier.update" : "supplier.store", $supplier) }}" method="POST">
            @csrf
            @method($supplier->exists ? "PATCH" : "POST")

            @php
            $fields = [
                "name" => [
                    "label" => "Noms du fournisseur"
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

                @include("shared.input", array_merge(["name" => $name, "value" => $supplier->$name], $properties))
            @endforeach

            <div class="field-container">
                <button type="submit">{{ $supplier->exists ? "Mettre à jour" : "Ajouter" }}</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>