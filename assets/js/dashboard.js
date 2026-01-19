import { auth, onAuthStateChanged, signOut } from './firebase-config.js';

let currentUser = null;

// check auth
function checkAuth() {
    const guestUser = sessionStorage.getItem('guestUser');
    
    if (guestUser) {
        currentUser = JSON.parse(guestUser);
        updateUI(currentUser);
        return;
    }
    
    onAuthStateChanged(auth, (user) => {
        if (user) {
            currentUser = {
                uid: user.uid,
                displayName: user.displayName || 'Utente',
                email: user.email,
                photoURL: user.photoURL,
                isGuest: false
            };
            updateUI(currentUser);
        } else {
            window.location.href = 'login.html';
        }
    });
}

// update ui with user info
function updateUI(user) {
    const userName = document.getElementById('userName');
    const userAvatar = document.getElementById('userAvatar');
    
    if (userName) {
        userName.textContent = user.displayName || user.email || 'Ospite';
    }
    
    if (userAvatar) {
        if (user.photoURL) {
            userAvatar.innerHTML = `<img src="${user.photoURL}" alt="Avatar">`;
        } else {
            const initials = getInitials(user.displayName || user.email || 'O');
            userAvatar.textContent = initials;
        }
    }
}

function getInitials(name) {
    return name.split(' ').map(n => n[0]).join('').toUpperCase().slice(0, 2);
}

// logout
async function logout() {
    try {
        sessionStorage.removeItem('guestUser');
        await signOut(auth);
        window.location.href = 'login.html';
    } catch (error) {
        console.error('Logout error:', error);
        window.location.href = 'login.html';
    }
}

// tabs
function initTabs() {
    const navItems = document.querySelectorAll('.nav-item');
    const tabContents = document.querySelectorAll('.tab-content');
    const pageTitle = document.getElementById('pageTitle');
    
    const titles = {
        'overview': 'Panoramica',
        'prestiti': 'Prestiti',
        'investimenti': 'Investimenti',
        'profilo': 'Area Personale',
        'assistente': 'FinanzIA'
    };
    
    navItems.forEach(item => {
        item.addEventListener('click', () => {
            const tab = item.dataset.tab;
            
            navItems.forEach(i => i.classList.remove('active'));
            item.classList.add('active');
            
            tabContents.forEach(content => {
                content.classList.remove('active');
                if (content.id === `tab-${tab}`) {
                    content.classList.add('active');
                }
            });
            
            if (pageTitle && titles[tab]) {
                pageTitle.textContent = titles[tab];
            }
        });
    });
}

// init
document.addEventListener('DOMContentLoaded', () => {
    checkAuth();
    initTabs();
    
    const logoutBtn = document.getElementById('logoutBtn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', logout);
    }
});

export { currentUser, logout };