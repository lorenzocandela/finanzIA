<!-- Tab Prestiti Content -->

<!-- Sub Navigation -->
<div class="tab-nav">
    <button class="tab-nav-btn active" data-subtab="simulatore">Simulatore</button>
    <button class="tab-nav-btn" data-subtab="richiesta">Richiedi prestito</button>
    <button class="tab-nav-btn" data-subtab="storico">Storico richieste</button>
</div>

<!-- Subtab: Simulatore -->
<div class="subtab-content active" id="subtab-simulatore">
    <div class="simulator-grid">
        <!-- Simulator Controls -->
        <div class="simulator-controls">
            <div class="section-header">
                <h2>Simula il tuo prestito</h2>
            </div>
            
            <div class="sim-card">
                <div class="sim-field">
                    <label class="label">Importo richiesto</label>
                    <div class="sim-slider-wrap">
                        <input type="range" class="sim-slider" id="simImporto" min="1000" max="60000" value="15000" step="500">
                        <div class="sim-slider-labels">
                            <span>€1.000</span>
                            <span class="sim-value-badge" id="simImportoValue">€15.000</span>
                            <span>€60.000</span>
                        </div>
                    </div>
                </div>
                
                <div class="sim-field">
                    <label class="label">Durata del prestito</label>
                    <div class="sim-slider-wrap">
                        <input type="range" class="sim-slider" id="simDurata" min="12" max="120" value="48" step="6">
                        <div class="sim-slider-labels">
                            <span>12 mesi</span>
                            <span class="sim-value-badge" id="simDurataValue">48 mesi</span>
                            <span>120 mesi</span>
                        </div>
                    </div>
                </div>
                
                <div class="sim-field">
                    <label class="label">Scopo del prestito</label>
                    <select class="input" id="simScopo">
                        <option value="auto">Acquisto auto</option>
                        <option value="casa">Ristrutturazione casa</option>
                        <option value="personale">Spese personali</option>
                        <option value="studio">Formazione/Studio</option>
                        <option value="viaggio">Viaggio</option>
                        <option value="altro">Altro</option>
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Simulator Result -->
        <div class="simulator-result">
            <div class="sim-result-card">
                <div class="sim-result-header">
                    <span class="sim-result-label">La tua rata mensile</span>
                    <div class="sim-result-amount" id="simRataValue">€362,50</div>
                </div>
                <div class="sim-result-details">
                    <div class="sim-detail">
                        <span>TAN (fisso)</span>
                        <strong>7,50%</strong>
                    </div>
                    <div class="sim-detail">
                        <span>TAEG</span>
                        <strong>8,20%</strong>
                    </div>
                    <div class="sim-detail">
                        <span>Totale dovuto</span>
                        <strong id="simTotaleValue">€17.400,00</strong>
                    </div>
                    <div class="sim-detail">
                        <span>Interessi totali</span>
                        <strong id="simInteressiValue">€2.400,00</strong>
                    </div>
                </div>
                <div class="sim-result-actions">
                    <button class="btn btn-primary btn-block" id="btnRichiediPrestito">
                        Richiedi questo prestito
                    </button>
                    <button class="btn btn-outline btn-block" id="btnToggleAmm">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 3h18v18H3zM3 9h18M9 21V9"/>
                        </svg>
                        Piano di ammortamento
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Piano Ammortamento -->
    <div class="amm-section" id="ammSection">
        <div class="section-header">
            <h2>Piano di ammortamento</h2>
            <button class="btn btn-sm btn-secondary" id="btnCloseAmm">Chiudi</button>
        </div>
        <div class="amm-table-wrap">
            <table class="amm-table">
                <thead>
                    <tr>
                        <th>Rata</th>
                        <th>Scadenza</th>
                        <th>Rata mensile</th>
                        <th>Quota capitale</th>
                        <th>Quota interessi</th>
                        <th>Debito residuo</th>
                    </tr>
                </thead>
                <tbody id="ammTableBody">
                    <!-- Generated by JS -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Subtab: Richiesta -->
<div class="subtab-content" id="subtab-richiesta">
    <div class="section-header">
        <h2>Richiedi un prestito</h2>
    </div>
    
    <!-- Riepilogo Prestito -->
    <div class="request-summary" id="requestSummary">
        <div class="summary-item">
            <span>Importo</span>
            <strong id="reqImporto">€15.000</strong>
        </div>
        <div class="summary-item">
            <span>Durata</span>
            <strong id="reqDurata">48 mesi</strong>
        </div>
        <div class="summary-item">
            <span>Rata mensile</span>
            <strong id="reqRata">€362,50</strong>
        </div>
        <div class="summary-item">
            <span>Scopo</span>
            <strong id="reqScopo">Acquisto auto</strong>
        </div>
    </div>
    
    <form class="request-form" id="loanRequestForm">
        <!-- Dati Anagrafici -->
        <div class="form-section">
            <h3>Dati anagrafici</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label class="label">Nome</label>
                    <input type="text" class="input" placeholder="Mario" required>
                </div>
                <div class="form-group">
                    <label class="label">Cognome</label>
                    <input type="text" class="input" placeholder="Rossi" required>
                </div>
                <div class="form-group">
                    <label class="label">Codice fiscale</label>
                    <input type="text" class="input" placeholder="RSSMRA80A01H501Z" required>
                </div>
                <div class="form-group">
                    <label class="label">Data di nascita</label>
                    <input type="date" class="input" required>
                </div>
                <div class="form-group">
                    <label class="label">Email</label>
                    <input type="email" class="input" placeholder="mario.rossi@email.com" required>
                </div>
                <div class="form-group">
                    <label class="label">Telefono</label>
                    <input type="tel" class="input" placeholder="+39 333 1234567" required>
                </div>
            </div>
        </div>
        
        <!-- Dati Lavorativi -->
        <div class="form-section">
            <h3>Situazione lavorativa</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label class="label">Tipo di impiego</label>
                    <select class="input" required>
                        <option value="">Seleziona...</option>
                        <option value="dipendente">Dipendente</option>
                        <option value="autonomo">Autonomo</option>
                        <option value="pensionato">Pensionato</option>
                        <option value="altro">Altro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="label">Reddito netto mensile</label>
                    <input type="number" class="input" placeholder="2.000" required>
                </div>
                <div class="form-group full-width">
                    <label class="label">Datore di lavoro / Azienda</label>
                    <input type="text" class="input" placeholder="Nome azienda">
                </div>
            </div>
        </div>
        
        <!-- Documenti -->
        <div class="form-section">
            <h3>Documenti</h3>
            <div class="upload-grid">
                <div class="upload-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="16" rx="2"/>
                        <circle cx="9" cy="10" r="2"/>
                        <path d="M21 15l-5-5L5 21"/>
                    </svg>
                    <span>Carta d'identità</span>
                    <input type="file" accept="image/*,.pdf">
                </div>
                <div class="upload-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                        <path d="M14 2v6h6M16 13H8M16 17H8M10 9H8"/>
                    </svg>
                    <span>Ultima busta paga</span>
                    <input type="file" accept="image/*,.pdf">
                </div>
                <div class="upload-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="5" width="20" height="14" rx="2"/>
                        <line x1="2" y1="10" x2="22" y2="10"/>
                    </svg>
                    <span>Codice fiscale</span>
                    <input type="file" accept="image/*,.pdf">
                </div>
            </div>
        </div>
        
        <!-- IBAN -->
        <div class="form-section">
            <h3>Conto corrente</h3>
            <div class="form-group">
                <label class="label">IBAN per l'accredito</label>
                <input type="text" class="input" placeholder="IT60X0542811101000000123456" required>
            </div>
        </div>
        
        <!-- Privacy -->
        <div class="form-section">
            <label class="checkbox-label">
                <input type="checkbox" required>
                <span>Ho letto e accetto l'<a target="_blank" href="https://portfolio.lorenzoo.it/">informativa sulla privacy</a> e i <a target="_blank" href="https://portfolio.lorenzoo.it/">termini e condizioni</a> del servizio.</span>
            </label>
        </div>
        
        <button type="submit" class="btn btn-primary btn-lg">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
            </svg>
            Invia richiesta
        </button>
    </form>
</div>

<!-- Subtab: Storico -->
<div class="subtab-content" id="subtab-storico">
    <div class="section-header">
        <h2>Le tue richieste</h2>
    </div>
    
    <div class="requests-list">
        <!-- Richiesta Approvata -->
        <div class="request-card">
            <div class="request-card-header">
                <div class="request-info">
                    <span class="request-type">Prestito Auto</span>
                    <span class="request-date">Richiesto il 10 Gen 2026</span>
                </div>
                <span class="request-status approved">Approvato</span>
            </div>
            <div class="request-card-body">
                <div class="request-detail">
                    <span>Importo</span>
                    <strong>€15.000</strong>
                </div>
                <div class="request-detail">
                    <span>Durata</span>
                    <strong>48 mesi</strong>
                </div>
                <div class="request-detail">
                    <span>Rata</span>
                    <strong>€362,50/mese</strong>
                </div>
            </div>
            <div class="request-card-footer">
                <button class="btn btn-sm btn-secondary">Vedi dettagli</button>
                <button class="btn btn-sm btn-outline">Scarica contratto</button>
            </div>
        </div>
        
        <!-- Richiesta In Valutazione -->
        <div class="request-card">
            <div class="request-card-header">
                <div class="request-info">
                    <span class="request-type">Ristrutturazione</span>
                    <span class="request-date">Richiesto il 15 Gen 2026</span>
                </div>
                <span class="request-status pending">In valutazione</span>
            </div>
            <div class="request-card-body">
                <div class="request-detail">
                    <span>Importo</span>
                    <strong>€8.000</strong>
                </div>
                <div class="request-detail">
                    <span>Durata</span>
                    <strong>36 mesi</strong>
                </div>
                <div class="request-detail">
                    <span>Rata</span>
                    <strong>€248,90/mese</strong>
                </div>
            </div>
            <div class="request-progress">
                <div class="progress-step completed">
                    <span class="step-dot"></span>
                    <span class="step-label">Inviata</span>
                </div>
                <div class="progress-line active"></div>
                <div class="progress-step active">
                    <span class="step-dot"></span>
                    <span class="step-label">In valutazione</span>
                </div>
                <div class="progress-line"></div>
                <div class="progress-step">
                    <span class="step-dot"></span>
                    <span class="step-label">Esito</span>
                </div>
            </div>
        </div>
        
        <!-- Richiesta Rifiutata -->
        <div class="request-card">
            <div class="request-card-header">
                <div class="request-info">
                    <span class="request-type">Spese personali</span>
                    <span class="request-date">Richiesto il 02 Dic 2025</span>
                </div>
                <span class="request-status rejected">Rifiutato</span>
            </div>
            <div class="request-card-body">
                <div class="request-detail">
                    <span>Importo</span>
                    <strong>€25.000</strong>
                </div>
                <div class="request-detail">
                    <span>Durata</span>
                    <strong>60 mesi</strong>
                </div>
                <div class="request-detail">
                    <span>Rata</span>
                    <strong>€497,50/mese</strong>
                </div>
            </div>
            <div class="request-card-footer">
                <span class="text-muted">Motivo: reddito insufficiente</span>
            </div>
        </div>
    </div>
</div>

<!-- Tab JS -->
<script src="../assets/js/tabs/prestiti.js"></script>