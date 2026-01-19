import { auth, googleProvider, signInWithPopup, sendSignInLinkToEmail, signInWithEmailLink, isSignInWithEmailLink, onAuthStateChanged } from './firebase-config.js';

const actionCodeSettings = {
    url: window.location.href.split('?')[0],
    handleCodeInApp: true
};

// google
async function loginWithGoogle() {
    try {
        const result = await signInWithPopup(auth, googleProvider);
        handleSuccessfulLogin(result.user);
    } catch (error) {
        showError(getErrorMessage(error.code));
    }
}

// mail link - send
async function sendMagicLink(email) {
    try {
        await sendSignInLinkToEmail(auth, email, actionCodeSettings);
        localStorage.setItem('emailForSignIn', email);
        showSuccess('Link inviato! Controlla la tua email.');
        return true;
    } catch (error) {
        showError(getErrorMessage(error.code));
        return false;
    }
}

// mail link - complete
async function completeMagicLinkLogin() {
    if (!isSignInWithEmailLink(auth, window.location.href)) return false;
    
    let email = localStorage.getItem('emailForSignIn');
    if (!email) {
        email = prompt('Inserisci la tua email per confermare:');
    }
    
    try {
        const result = await signInWithEmailLink(auth, email, window.location.href);
        localStorage.removeItem('emailForSignIn');
        handleSuccessfulLogin(result.user);
        return true;
    } catch (error) {
        showError(getErrorMessage(error.code));
        return false;
    }
}

// guest
function loginAsGuest() {
    const guestUser = {
        uid: 'guest_' + Date.now(),
        displayName: 'Ospite',
        email: null,
        isGuest: true
    };
    sessionStorage.setItem('guestUser', JSON.stringify(guestUser));
    window.location.href = 'dashboard.php';
}

function handleSuccessfulLogin(user) {
    sessionStorage.removeItem('guestUser');
    window.location.href = 'dashboard.php';
}

onAuthStateChanged(auth, (user) => {
    const isLoginPage = window.location.pathname.includes('login');
    const guestUser = sessionStorage.getItem('guestUser');
    
    if (user && isLoginPage) {
        window.location.href = 'dashboard.php';
    }
});

function showError(message) {
    const el = document.getElementById('authMessage');
    if (el) {
        el.textContent = message;
        el.className = 'auth-message error';
        el.style.display = 'block';
    }
}

function showSuccess(message) {
    const el = document.getElementById('authMessage');
    if (el) {
        el.textContent = message;
        el.className = 'auth-message success';
        el.style.display = 'block';
    }
}

function getErrorMessage(code) {
    const messages = {
        'auth/popup-closed-by-user': 'Accesso annullato',
        'auth/invalid-email': 'Email non valida',
        'auth/user-not-found': 'Utente non trovato',
        'auth/too-many-requests': 'Troppi tentativi, riprova piu tardi',
        'auth/network-request-failed': 'Errore di connessione'
    };
    return messages[code] || 'Si e verificato un errore';
}

// init
document.addEventListener('DOMContentLoaded', () => {
    completeMagicLinkLogin();
    
    const googleBtn = document.getElementById('googleLogin');
    if (googleBtn) {
        googleBtn.addEventListener('click', loginWithGoogle);
    }
    
    const magicForm = document.getElementById('magicLinkForm');
    if (magicForm) {
        magicForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const email = document.getElementById('emailInput').value;
            const btn = magicForm.querySelector('button');
            btn.disabled = true;
            btn.textContent = 'Invio in corso...';
            
            const success = await sendMagicLink(email);
            if (!success) {
                btn.disabled = false;
                btn.textContent = 'Invia link';
            }
        });
    }
    
    const guestBtn = document.getElementById('guestLogin');
    if (guestBtn) {
        guestBtn.addEventListener('click', loginAsGuest);
    }
});

export { loginWithGoogle, sendMagicLink, loginAsGuest };