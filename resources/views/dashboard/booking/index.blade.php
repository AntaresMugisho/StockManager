<x-dashboard-layout>
    
    <div class="stock-container">
        <div class="dashboard-heading">
            <h2 class="dashboard-heading-title">Mouvements</h2>
            <p class="dashboard-heading-description">Gérer les mouvements d'entrée et sortie des marchandises en stock</p>
        </div>
        
        <a href="{{ route("booking.create") }}">Book now</a>

        @if (session("success"))
            <div class="alert alert-success">{{ session("success") }}</div>
        @endif
    </div>
    
</x-dashboard-layout>