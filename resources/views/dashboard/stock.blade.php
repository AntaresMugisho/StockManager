<x-dashboard-layout>

    <x-slot name="header">
        <h2 class="title">Stock</h2>
        <p class="description">Un oeil sur l'état des articles en stock</p>
    </x-slot>

    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix d'achat unitaire</th>
                    <th>Prix de vente unitaire</th>
                    <th>Stock</th>
                    <th>Minimum</th>
                    <th>Valeur du stock</th>
                    <th>Bénéfice attendu</th>
                    <th>Actif</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>ART-0001</td>
                    <td>T-shirt Blanc M</td>
                    <td>Imprimable, 100% coton</td>
                    <td>2</td>
                    <td>3</td>
                    <td>128</td>
                    <td>12</td>
                    <td>384</td>
                    <td>128</td>
                    <td>Oui</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>ART-0002</td>
                    <td>T-shirt Blanc M</td>
                    <td>Imprimable, 100% coton</td>
                    <td>2</td>
                    <td>3</td>
                    <td>128</td>
                    <td>12</td>
                    <td>384</td>
                    <td>128</td>
                    <td>Oui</td>
                </tr>
            </tbody>
        </table>
    </div>
</x-dashboard-layout>