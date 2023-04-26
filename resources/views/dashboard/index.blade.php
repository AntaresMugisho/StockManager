
<x-dashboard-layout>

    <div class="home-container">
        <div class="resume-container">
            <div class="action-bar">
                <ul class="action-buttons-container">
                    <li>
                        <a href="{{ route("article.create") }}" class="action-button">Nouvel article</a>
                    </li>
                    <li>
                        <a href="{{ route("order.create") }}" class="action-button">Commander</a>
                    </li>
                    <li>
                        <a href="{{ route("booking.create") }}" class="action-button">Book</a>
                    </li>
                    <li>
                        <a href="{{ route("supplier.index") }}" class="action-button">Fournisseurs</a>
                    </li>
                    <li>
                        <a href="{{ route("client.index") }}" class="action-button">Clients</a>
                    </li>
                </ul>
            </div>
        
            <div class="progress-card-container">
                <div class="progress-card">
                    <i class="progress-card-icon fa-solid fa-solid fa-chart-line"></i>
                    <h4 class="progress-card-label">Articles actifs</h4>
                    @include('components.circular_progressbar')
                </div>
                <div class="progress-card">
                    <i class="progress-card-icon fa-solid fa-cubes-stacked"></i>
                    <h4 class="progress-card-label">Volume du stock</h4>
                    @include('components.circular_progressbar')
                </div>
                <div class="progress-card">
                    <i class="progress-card-icon fa-solid fa-file-invoice-dollar"></i>
                    <h4 class="progress-card-label">Valeur du stock</h4>
                    @include('components.circular_progressbar')
                </div>
            </div>
            <div class="gauge-container">
                <div class="gauge">
                    <div class="gauge-body">
                        <div class="gauge-fill" id="gauge_fill"></div>
                        <div class="gauge-cover" id="gauge_cover">0%</div>
                    </div>
                    <p class="gauge-label">Articles critiques</p>
                </div>
                <div class="gauge">
                    <div class="gauge-body">
                        <div class="gauge-fill" id="gauge_fill"></div>
                        <div class="gauge-cover" id="gauge_cover">0%</div>
                    </div>
                    <p class="gauge-label">Articles commandés</p>
                </div>
            </div>
        </div>
        <div class="financial-review">
            <h4>Fiances</h4>
            <ul>
                <li><span class="small">Capital initial</span> $ 1500,00</li>
                <li><span class="small">Valeur des commandes</span> $ 1500,00</li>
                <li><span class="small">Valeur de ventes</span> $ 1500,00</li>
                <li><span class="small">Créances</span> $ 1500,00</li>
                <li><span class="small">Caisse</span> $ 1500,00</li>
            </ul>
        </div>
    </div>

    <script>
        const gaugeElement = document.querySelectorAll(".gauge");

        function setGaugeValue(gauge, value){
            if (value < 0 || value > 1){
                return
            }

            gauge.forEach((gauge, index) => {
                gauge.querySelector(".gauge-fill").style.transform = `rotate(${value*(index+1)*0.5/2}turn)`
                gauge.querySelector(".gauge-cover").textContent = `${value*(index+1)*0.5*100}%`
            });
        }

        setGaugeValue(gaugeElement, 0.5)
    </script>
</x-dashboard-layout>

