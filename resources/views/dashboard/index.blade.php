
<x-dashboard-layout>
    
    <div class="gauge">
        <div class="gauge-body">
            <div class="gauge-fill" id="gauge_fill"></div>
            <div class="gauge-cover" id="gauge_cover">0%</div>
        </div>
    </div>

    <script>
        const gaugeElement = document.querySelector(".gauge");

        function setGaugeValue(gauge, value){
            if (value < 0 || value > 1){
                return
            }

            gauge.querySelector(".gauge-fill").style.transform = `rotate(${value/2}turn)`
            gauge.querySelector(".gauge-cover").textContent = `${value*100}%`
        }

        setGaugeValue(gaugeElement, 0.75)
    </script>
</x-dashboard-layout>

