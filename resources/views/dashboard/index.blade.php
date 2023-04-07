
<x-dashboard-layout>


    <div class="progress-card">
        <div class="head">
            <span class="iconify" data-icon="ic:outline-auto-graph" data-inline="false"></span>
        </div>
        <div class="box">
            <svg>
                <circle cx="75px" cy="75px" r="60px"></circle>
                <circle cx="75px" cy="75px" r="60px"></circle>
                <defs>
                    <linearGradient id="linear" x1="0%" y1="0%" x2="0%" y2="0%">
                        <stop offset="0" stop-color="#ffffff"></stop>
                        <stop offset="1" stop-color="#000000"></stop>
                    </linearGradient>
                </defs>
            </svg>
            <div class="value"><span>20%</span></div>
        </div>
        <div class="label">
            <span>Articles actifs</span>
        </div>
    </div>
    
    {{-- <div class="gauge">
        <div class="gauge-body">
            <div class="gauge-fill" id="gauge_fill"></div>
            <div class="gauge-cover" id="gauge_cover">0%</div>
        </div>
    </div> --}}

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

