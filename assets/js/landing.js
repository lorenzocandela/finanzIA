document.addEventListener('DOMContentLoaded', function() {
    const importoSlider = document.getElementById('importo');
    const durataSlider = document.getElementById('durata');
    const importoValue = document.getElementById('importoValue');
    const durataValue = document.getElementById('durataValue');
    const rataValue = document.getElementById('rataValue');

    function formatNumber(num) {
        return num.toLocaleString('it-IT');
    }

    function calcRata() {
        const importo = parseInt(importoSlider.value);
        const durata = parseInt(durataSlider.value);
        const tassoAnnuo = 0.075;
        const tassoMensile = tassoAnnuo / 12;
        const rata = (importo * tassoMensile * Math.pow(1 + tassoMensile, durata)) / (Math.pow(1 + tassoMensile, durata) - 1);
        
        importoValue.textContent = formatNumber(importo);
        durataValue.textContent = durata;
        rataValue.textContent = formatNumber(Math.round(rata * 100) / 100);
    }

    importoSlider.addEventListener('input', calcRata);
    durataSlider.addEventListener('input', calcRata);
    
    calcRata();
});
