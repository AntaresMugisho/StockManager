<x-dashboard-layout>

    <div class="stock-container">
        <div class="dashboard-heading">
            <h2 class="dashboard-heading-title">Suivie du stock</h2>
            <p class="dashboard-heading-description">Un oeil sur l'état des articles en stock</p>
        </div>

        @if (session("status") === "article-created")
            <div class="alert alert-success">L'article a été créé avec succès !</div>
        @endif

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>PAU</th>
                        <th>PVU</th>
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
                        <td>T-shirt Blanc S</td>
                        <td>Imprimable, 100% coton</td>
                        <td class="currency">2 $</td>
                        <td class="currency">3 $</td>
                        <td>128</td>
                        <td>12</td>
                        <td class="currency">384 $</td>
                        <td class="currency">128 $</td>
                        <td>Oui</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>ART-0001</td>
                        <td>T-shirt Blanc S</td>
                        <td>Imprimable, 100% coton</td>
                        <td class="currency">2 $</td>
                        <td class="currency">3 $</td>
                        <td>128</td>
                        <td>12</td>
                        <td class="currency">384 $</td>
                        <td class="currency">128 $</td>
                        <td>Oui</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>ART-0001</td>
                        <td>T-shirt Blanc S</td>
                        <td>Imprimable, 100% coton</td>
                        <td class="currency">2 $</td>
                        <td class="currency">3 $</td>
                        <td>128</td>
                        <td>12</td>
                        <td class="currency">384 $</td>
                        <td class="currency">128 $</td>
                        <td>Oui</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>ART-0001</td>
                        <td>T-shirt Blanc S</td>
                        <td>Imprimable, 100% coton</td>
                        <td class="currency">2 $</td>
                        <td class="currency">3 $</td>
                        <td>128</td>
                        <td>12</td>
                        <td class="currency">384 $</td>
                        <td class="currency">128 $</td>
                        <td>Oui</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>ART-0001</td>
                        <td>T-shirt Blanc S</td>
                        <td>Imprimable, 100% coton</td>
                        <td class="currency">2 $</td>
                        <td class="currency">3 $</td>
                        <td>128</td>
                        <td>12</td>
                        <td class="currency">384 $</td>
                        <td class="currency">128 $</td>
                        <td>Oui</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>ART-0001</td>
                        <td>T-shirt Blanc S</td>
                        <td>Imprimable, 100% coton</td>
                        <td class="currency">2 $</td>
                        <td class="currency">3 $</td>
                        <td>128</td>
                        <td>12</td>
                        <td class="currency">384 $</td>
                        <td class="currency">128 $</td>
                        <td>Oui</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>ART-0001</td>
                        <td>Article avec un nom plus long</td>
                        <td>Imprimable, 100% coton</td>
                        <td class="currency">2 $</td>
                        <td class="currency">3 $</td>
                        <td>128</td>
                        <td>12</td>
                        <td class="currency">384 $</td>
                        <td class="currency">128 $</td>
                        <td>Oui</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>ART-0001</td>
                        <td>T-shirt Blanc S</td>
                        <td>Imprimable, 100% coton</td>
                        <td class="currency">2 $</td>
                        <td class="currency">3 $</td>
                        <td>128</td>
                        <td>12</td>
                        <td class="currency">384 $</td>
                        <td class="currency">128 $</td>
                        <td>Oui</td>
                    </tr>
          
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>