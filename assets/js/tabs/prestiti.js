/**
 * Tab: Prestiti
 * Simulatore, piano ammortamento, form richiesta
 */

(function() {
    'use strict';
    
    const TAN = 0.075; // 7.50% annual
    
    // ==================== UTILS ====================
    
    function formatCurrency(num) {
        return '€' + num.toLocaleString('it-IT', { 
            minimumFractionDigits: 2, 
            maximumFractionDigits: 2 
        });
    }
    
    function formatCurrencyShort(num) {
        return '€' + num.toLocaleString('it-IT', { 
            minimumFractionDigits: 0, 
            maximumFractionDigits: 0 
        });
    }
    
    // ==================== SIMULATOR ====================
    
    function initSimulator() {
        const importoSlider = document.getElementById('simImporto');
        const durataSlider = document.getElementById('simDurata');
        const scopoSelect = document.getElementById('simScopo');
        
        if (!importoSlider || !durataSlider) return;
        
        // Display elements
        const els = {
            importoValue: document.getElementById('simImportoValue'),
            durataValue: document.getElementById('simDurataValue'),
            rataValue: document.getElementById('simRataValue'),
            totaleValue: document.getElementById('simTotaleValue'),
            interessiValue: document.getElementById('simInteressiValue'),
            // Request summary
            reqImporto: document.getElementById('reqImporto'),
            reqDurata: document.getElementById('reqDurata'),
            reqRata: document.getElementById('reqRata'),
            reqScopo: document.getElementById('reqScopo')
        };
        
        function calcLoan() {
            const importo = parseInt(importoSlider.value);
            const durata = parseInt(durataSlider.value);
            const tassoMensile = TAN / 12;
            
            // French amortization formula
            const rata = (importo * tassoMensile * Math.pow(1 + tassoMensile, durata)) / 
                         (Math.pow(1 + tassoMensile, durata) - 1);
            const totale = rata * durata;
            const interessi = totale - importo;
            
            // Update simulator display
            if (els.importoValue) els.importoValue.textContent = formatCurrencyShort(importo);
            if (els.durataValue) els.durataValue.textContent = durata + ' mesi';
            if (els.rataValue) els.rataValue.textContent = formatCurrency(rata);
            if (els.totaleValue) els.totaleValue.textContent = formatCurrency(totale);
            if (els.interessiValue) els.interessiValue.textContent = formatCurrency(interessi);
            
            // Update request summary
            if (els.reqImporto) els.reqImporto.textContent = formatCurrencyShort(importo);
            if (els.reqDurata) els.reqDurata.textContent = durata + ' mesi';
            if (els.reqRata) els.reqRata.textContent = formatCurrency(rata);
            
            return { importo, durata, rata, totale, interessi, tassoMensile };
        }
        
        function updateScopo() {
            if (scopoSelect && els.reqScopo) {
                els.reqScopo.textContent = scopoSelect.options[scopoSelect.selectedIndex].text;
            }
        }
        
        // Event listeners
        importoSlider.addEventListener('input', calcLoan);
        durataSlider.addEventListener('input', calcLoan);
        if (scopoSelect) scopoSelect.addEventListener('change', updateScopo);
        
        // Initial calculation
        calcLoan();
        updateScopo();
        
        // Return calc function for amortization
        return calcLoan;
    }
    
    // ==================== AMORTIZATION ====================
    
    function initAmortization(calcLoanFn) {
        const btnToggle = document.getElementById('btnToggleAmm');
        const btnClose = document.getElementById('btnCloseAmm');
        const ammSection = document.getElementById('ammSection');
        const ammTableBody = document.getElementById('ammTableBody');
        
        if (!btnToggle || !ammSection) return;
        
        function generateTable() {
            const { importo, durata, rata, tassoMensile } = calcLoanFn();
            let debitoResiduo = importo;
            const rows = [];
            const today = new Date();
            
            for (let i = 1; i <= durata; i++) {
                const quotaInteressi = debitoResiduo * tassoMensile;
                const quotaCapitale = rata - quotaInteressi;
                debitoResiduo -= quotaCapitale;
                
                const scadenza = new Date(today);
                scadenza.setMonth(scadenza.getMonth() + i);
                
                rows.push(`
                    <tr>
                        <td>${i}</td>
                        <td>${scadenza.toLocaleDateString('it-IT', { month: 'short', year: 'numeric' })}</td>
                        <td>${formatCurrency(rata)}</td>
                        <td>${formatCurrency(quotaCapitale)}</td>
                        <td>${formatCurrency(quotaInteressi)}</td>
                        <td>${formatCurrency(Math.max(0, debitoResiduo))}</td>
                    </tr>
                `);
            }
            
            if (ammTableBody) {
                ammTableBody.innerHTML = rows.join('');
            }
        }
        
        btnToggle.addEventListener('click', () => {
            generateTable();
            ammSection.classList.add('open');
            ammSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
        
        if (btnClose) {
            btnClose.addEventListener('click', () => {
                ammSection.classList.remove('open');
            });
        }
    }
    
    // ==================== REQUEST FORM ====================
    
    function initRequestForm() {
        const btnRichiedi = document.getElementById('btnRichiediPrestito');
        const form = document.getElementById('loanRequestForm');
        
        // Go to request subtab
        if (btnRichiedi) {
            btnRichiedi.addEventListener('click', () => {
                switchToSubtab('richiesta');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
        
        // Form submission
        if (form) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                
                // TODO: Replace with actual API call
                alert('Richiesta inviata con successo! Ti contatteremo entro 24-48 ore.');
                
                // Switch to storico
                switchToSubtab('storico');
            });
        }
    }
    
    function switchToSubtab(subtabName) {
        const container = document.getElementById('tab-prestiti');
        if (!container) return;
        
        // Update nav buttons
        container.querySelectorAll('.tab-nav-btn').forEach(b => {
            b.classList.toggle('active', b.dataset.subtab === subtabName);
        });
        
        // Update content
        container.querySelectorAll('.subtab-content').forEach(content => {
            content.classList.toggle('active', content.id === `subtab-${subtabName}`);
        });
    }
    
    // ==================== INIT ====================
    
    function init() {
        const calcLoanFn = initSimulator();
        if (calcLoanFn) {
            initAmortization(calcLoanFn);
        }
        initRequestForm();
    }
    
    // Run on DOM ready or immediately if already loaded
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    
})();