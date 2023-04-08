
<x-dashboard-layout>


    <div class="progress-card-container">
        <div class="progress-card">
            <i class="progress-card-icon fa-solid fa-solid fa-chart-line"></i>
            <div>
                <h4 class="progress-card-label">Articles actifs</h4>
                <p class="progress-card-details">
                    <span>+250 articles actifs</span><br>
                    <span>121 articles inactifs</span>
                </p>
            </div>
            @include('components.circular_progressbar')
        </div>

        <div class="progress-card">
            <i class="progress-card-icon fa-solid fa-solid fa-chart-line"></i>
            <div>
                <h4 class="progress-card-label">Articles actifs</h4>
                <p class="progress-card-details">
                    <span>+250 articles actifs</span><br>
                    <span>121 articles inactifs</span>
                </p>
            </div>
            @include('components.circular_progressbar')
        </div>

        <div class="progress-card">
            <i class="progress-card-icon fa-solid fa-solid fa-chart-line"></i>
            <div>
                <h4 class="progress-card-label">Articles actifs</h4>
                <p class="progress-card-details">
                    <span>250 articles actifs</span><br>
                    <span>121 articles inactifs</span>
                </p>
            </div>
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
            <p class="gauge-label">Articles critiques</p>
        </div>
    </div>

    <script>
        const gaugeElement = document.querySelectorAll(".gauge");

        function setGaugeValue(gauge, value){
            if (value < 0 || value > 1){
                return
            }

            gauge.forEach(gauge => {
                gauge.querySelector(".gauge-fill").style.transform = `rotate(${value/2}turn)`
                gauge.querySelector(".gauge-cover").textContent = `${value*100}%`
            });
        }

        setGaugeValue(gaugeElement, 0.5)
    </script>
</x-dashboard-layout>

