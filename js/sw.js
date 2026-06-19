// Globale variabelen voor de status
let currentLang = localStorage.getItem('fitvault_lang') || 'nl';
let currentTheme = localStorage.getItem('fitvault_theme') || 'dark';

document.addEventListener('DOMContentLoaded', () => {
    initTheme();
    initLanguage();
});

// --- LIGHT / DARK MODE LOGICA ---
function initTheme() {
    applyTheme(currentTheme);
}

function toggleTheme() {
    currentTheme = currentTheme === 'dark' ? 'light' : 'dark';
    localStorage.setItem('fitvault_theme', currentTheme);
    applyTheme(currentTheme);
}

function applyTheme(theme) {
    const html = document.documentElement;
    if (theme === 'dark') {
        html.classList.remove('light-mode');
        html.classList.add('dark');
        document.body.style.backgroundColor = '#0b0f19';
    } else {
        html.classList.remove('dark');
        html.classList.add('light-mode');
        document.body.style.backgroundColor = '#f1f5f9';
    }
}

// --- TAAL SWITCH LOGICA ---
function initLanguage() {
    loadTranslations(currentLang);
}

function toggleLanguage() {
    currentLang = currentLang === 'nl' ? 'en' : 'nl';
    localStorage.setItem('fitvault_lang', currentLang);
    loadTranslations(currentLang);
}

function loadTranslations(lang) {
    fetch('../locales/' + lang + '.json')
        .then(response => response.json())
        .then(translations => {
            document.querySelectorAll('[id^="txt-"], [id^="lbl-"], [id^="btn-"], [id^="nav-"]').forEach(element => {
                const key = element.id.replace(/^(txt-|lbl-|btn-|nav-)/, '');
                if (translations[key]) {
                    if (element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') {
                        element.placeholder = translations[key];
                    } else {
                        element.innerHTML = translations[key];
                    }
                }
            });
        }).catch(err => console.log('Fout bij laden vertaling:', err));
}

// --- SERVICE WORKER REGISTRATIE ---
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js')
            .then(reg => console.log('Service Worker geregistreerd!', reg))
            .catch(err => console.log('Service Worker crash:', err));
    });
}