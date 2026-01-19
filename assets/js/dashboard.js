/**
 * Dashboard Main JS
 * Auth, tab switching, mobile sidebar
 */

import { auth, onAuthStateChanged, signOut } from './firebase-config.js';

let currentUser = null;

// ==================== AUTH ====================

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

// ==================== TAB NAVIGATION ====================

function initTabs() {
    const navItems = document.querySelectorAll('.nav-item[data-tab]');
    const tabContents = document.querySelectorAll('.tab-content');
    
    navItems.forEach(item => {
        item.addEventListener('click', () => {
            const tab = item.dataset.tab;
            switchToTab(tab);
        });
    });
    
    // Handle data-goto-tab buttons/links
    document.addEventListener('click', (e) => {
        const gotoBtn = e.target.closest('[data-goto-tab]');
        if (gotoBtn) {
            e.preventDefault();
            const tab = gotoBtn.dataset.gotoTab;
            switchToTab(tab);
        }
    });
}

function switchToTab(tabName) {
    const navItems = document.querySelectorAll('.nav-item[data-tab]');
    const tabContents = document.querySelectorAll('.tab-content');
    
    // Update nav
    navItems.forEach(i => i.classList.remove('active'));
    const activeNav = document.querySelector(`.nav-item[data-tab="${tabName}"]`);
    if (activeNav) activeNav.classList.add('active');
    
    // Update content
    tabContents.forEach(content => {
        content.classList.remove('active');
        if (content.id === `tab-${tabName}`) {
            content.classList.add('active');
        }
    });
    
    // Close mobile sidebar if open
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    if (sidebar) sidebar.classList.remove('open');
    if (overlay) overlay.classList.remove('open');
}

// ==================== SUBTAB NAVIGATION ====================

function initSubTabs() {
    document.addEventListener('click', (e) => {
        const tabBtn = e.target.closest('.tab-nav-btn');
        if (!tabBtn) return;
        
        const subtab = tabBtn.dataset.subtab;
        const container = tabBtn.closest('.tab-content');
        
        // Update nav buttons
        container.querySelectorAll('.tab-nav-btn').forEach(b => b.classList.remove('active'));
        tabBtn.classList.add('active');
        
        // Update subtab content
        container.querySelectorAll('.subtab-content').forEach(content => {
            content.classList.remove('active');
            if (content.id === `subtab-${subtab}`) {
                content.classList.add('active');
            }
        });
    });
}

// ==================== MOBILE SIDEBAR ====================

function initMobileSidebar() {
    const mobileToggle = document.getElementById('mobileToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    
    if (!mobileToggle || !sidebar) return;
    
    mobileToggle.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        sidebarOverlay.classList.toggle('open');
    });
    
    sidebarOverlay.addEventListener('click', () => {
        sidebar.classList.remove('open');
        sidebarOverlay.classList.remove('open');
    });
}

// ==================== INIT ====================

document.addEventListener('DOMContentLoaded', () => {
    checkAuth();
    initTabs();
    initSubTabs();
    initMobileSidebar();
    
    // Logout button
    const logoutBtn = document.getElementById('logoutBtn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', logout);
    }
});

// Export for use in tab modules
export { currentUser, logout, switchToTab };