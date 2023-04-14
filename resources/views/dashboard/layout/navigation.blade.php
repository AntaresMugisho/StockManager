

<nav class="dashboard-navigation">
    <ul>
        <li>
            <a href="{{ route('dashboard.index') }}" class="nav-link">@include("components.application-logo")</a>
        </li>
    </ul>
    <ul>
        <li><a href="{{route("dashboard.index")}}" class="nav-link nav-link-active"><i class="bi bi-house-fill"></i> Accueil</a></li>
        <li><a href="{{route("dashboard.stock")}}" class="nav-link"><i class="fa-solid fa-cubes"></i></i>Stock</a></li>
        <li><a href="{{route("dashboard.orders")}}" class="nav-link"><i class="fa-solid fa-cart-arrow-down"></i> Commandes</a></li>
        <li><a href="#" class="nav-link"><i class="fa-solid fa-file-invoice-dollar"></i> Factures</a></li>
        <li><a href="#" class="nav-link"><i class="fa-solid fa-print"></i> Imprimables</a></li>
    </ul>
    <ul>
        <li><a href="#" class="nav-link"><i class="fa-solid fa-sliders"></i> Paramètres</a></li>
    </ul>
</nav>