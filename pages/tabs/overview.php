<!-- Tab Overview Content -->

<!-- Balance Card -->
<div class="balance-card">
    <div class="balance-card-inner">
        <div class="balance-left">
            <span class="balance-amount">12.450,00</span>
            <span class="balance-sub">Debito residuo</span>
        </div>
        <div class="balance-right">
            <button class="balance-btn" data-goto-tab="prestiti">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 2v20M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                </svg>
                Richiedi
            </button>
            <button class="balance-btn filled" data-goto-tab="pagamenti">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                    <line x1="1" y1="10" x2="23" y2="10"/>
                </svg>
                Paga rata
            </button>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="section-header">
    <h2>Riepilogo finanziario</h2>
</div>

<div class="stats-row">
    <div class="stat-box">
        <div class="stat-box-header">
            <span>Prestiti attivi</span>
            <button class="more-btn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/>
                </svg>
            </button>
        </div>
        <div class="stat-box-value no-euro">3</div>
        <div class="stat-box-change up">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="18 15 12 9 6 15"/>
            </svg>
            1 nuovo
        </div>
    </div>
    <div class="stat-box">
        <div class="stat-box-header">
            <span>Rate pagate</span>
            <button class="more-btn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/>
                </svg>
            </button>
        </div>
        <div class="stat-box-value">2.175,00</div>
        <div class="stat-box-change">questo mese</div>
    </div>
    <div class="stat-box">
        <div class="stat-box-header">
            <span>Investimenti</span>
            <button class="more-btn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/>
                </svg>
            </button>
        </div>
        <div class="stat-box-value">5.230,00</div>
        <div class="stat-box-change up">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="18 15 12 9 6 15"/>
            </svg>
            +4,2%
        </div>
    </div>
</div>

<!-- Chart -->
<div class="chart-card">
    <div class="chart-header">
        <h3>Andamento pagamenti</h3>
    </div>
    <div class="chart-area">
        <div class="chart-y-lines">
            <div class="y-line"></div>
            <div class="y-line"></div>
            <div class="y-line"></div>
            <div class="y-line"></div>
            <div class="y-line"></div>
            <div class="y-line"></div>
            <div class="y-line"></div>
            <div class="y-line"></div>
            <div class="y-line"></div>
        </div>
        <div class="chart-container">
            <div class="chart-tooltip">2.289</div>
            <div class="chart-point"></div>
            <svg viewBox="0 0 500 150" class="chart-svg" preserveAspectRatio="none">
                <path d="M0,120 C30,110 50,100 80,95 C110,90 130,105 160,95 C190,85 210,60 250,55 C290,50 310,70 340,60 C370,50 400,40 430,50 C460,60 480,45 500,40" 
                    fill="none" 
                    stroke="var(--navy-800)" 
                    stroke-width="2.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="chart-x-axis">
            <span>GEN</span>
            <span>FEB</span>
            <span>MAR</span>
            <span>APR</span>
            <span>MAG</span>
            <span>GIU</span>
            <span>LUG</span>
            <span>AGO</span>
            <span>SET</span>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="quick-actions">
    <div class="quick-action-card" data-goto-tab="prestiti">
        <h4>Simula prestito</h4>
        <div class="quick-avatars">
            <span class="quick-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                </svg>
            </span>
        </div>
    </div>
    <div class="quick-action-card">
        <h4>Prossime scadenze</h4>
        <div class="scheduled-items">
            <div class="scheduled-item">
                <span class="sched-name">Auto</span>
                <span class="sched-amount">362,50/mese</span>
            </div>
            <div class="scheduled-item">
                <span class="sched-name">Casa</span>
                <span class="sched-amount">280,00/mese</span>
            </div>
        </div>
    </div>
</div>