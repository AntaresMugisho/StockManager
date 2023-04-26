

<nav class="dashboard-navigation">
    <ul>
        <li>
            <a href="{{ route('dashboard.index') }}" class="nav-link">@include("components.application-logo")</a>
        </li>
    </ul>
    @php
        $route = request()->route()->getName();
    @endphp
    
    <ul>
        <li><a href="{{ route("dashboard.index") }}" class="nav-link {{ ($route == "dashboard.index") ? "nav-link-active" : null }}"><i class="bi bi-house-fill"></i> Accueil</a></li>
        <li><a href="{{ route("article.index") }}" class="nav-link {{ str_contains($route, "article.") ? "nav-link-active" : null }}"><i class="fa-solid fa-cubes"></i></i>Stock</a></li>
        <li><a href="{{ route("order.index") }}" class="nav-link {{ str_contains($route, "order.") ? "nav-link-active" : null }}"><i class="fa-solid fa-cart-arrow-down"></i> Commandes</a></li>
        <li><a href="{{ route("invoice.index") }}" class="nav-link {{ str_contains($route, "invoice.") ? "nav-link-active" : null }}"><i class="fa-solid fa-file-invoice-dollar"></i> Factures</a></li>
        {{-- <li><a href="#" class="nav-link"><i class="fa-solid fa-print"></i>Imprimables</a></li> --}}
    </ul>
    <ul>
        <li><a href="#" class="nav-link"><i class="fa-solid fa-sliders"></i> Paramètres</a></li>
    </ul>
</nav>