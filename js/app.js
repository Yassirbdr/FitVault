window.currentLang = localStorage.getItem('fitvault_lang') || 'nl';

// 1. Vertalingen toepassen
window.applyTranslations = function(translations) {
    if (!translations) return;
    const ids = [
        { id: 'txt-welcome', key: 'welcome', type: 'text' },
        { id: 'txt-onboarding_subtitle', key: 'onboarding_subtitle', type: 'text' },
        { id: 'lbl-your_name', key: 'your_name', type: 'text' },
        { id: 'lbl-choose_goal', key: 'choose_goal', type: 'text' },
        { id: 'txt-lose_weight', key: 'lose_weight', type: 'text' },
        { id: 'txt-gain_weight', key: 'gain_weight', type: 'text' },
        { id: 'lbl-protein_goal', key: 'protein_goal', type: 'text' },
        { id: 'lbl-step_goal', key: 'step_goal', type: 'text' },
        { id: 'btn-start_btn', key: 'start_btn', type: 'text' },
        { id: 'txt-today', key: 'today', type: 'text' },
        { id: 'txt-calories_left', key: 'calories_left', type: 'text' },
        { id: 'txt-add_meal', key: 'add_meal', type: 'text' },
        { id: 'txt-calories_goal', key: 'calories_goal', type: 'text' },
        { id: 'txt-macronutrients', key: 'macronutrients', type: 'text' },
        { id: 'txt-water_today', key: 'water_today', type: 'text' },
        { id: 'btn-add_water', key: 'add_water', type: 'text' },
        { id: 'btn-add_file', key: 'add_meal', type: 'text' },
        { id: 'nav-dashboard', key: 'dashboard', type: 'text' },
        { id: 'nav-logbook', key: 'logbook', type: 'text' },
        { id: 'nav-analytics', key: 'analytics', type: 'text' },
        { id: 'txt-daily_summary', key: 'daily_summary', type: 'text' },
        { id: 'txt-analytics_subtitle', key: 'analytics_subtitle', type: 'text' },
        { id: 'mealName', key: 'placeholder_meal_name', type: 'placeholder' },
        { id: 'mealKcal', key: 'placeholder_kcal', type: 'placeholder' },
        { id: 'mealProtein', key: 'placeholder_protein', type: 'placeholder' },
        { id: 'btn-reset_account', key: 'reset_account', type: 'text' }
    ];
    ids.forEach(item => {
        const el = document.getElementById(item.id);
        if (el && translations[item.key]) {
            if (item.type === 'text') el.innerText = translations[item.key];
            else if (item.type === 'placeholder') el.placeholder = translations[item.key];
        }
    });
};

window.loadLanguage = async function(lang) {
    try {
        const path = window.location.pathname.includes('/pages/') ? '../locales/' : 'locales/';
        const response = await fetch(`${path}${lang}.json`);
        const translations = await response.json();
        window.applyTranslations(translations);
        localStorage.setItem('fitvault_lang', lang);
        window.currentLang = lang;
        updateSwitchVisuals();
    } catch (error) {
        console.error(error);
    }
};

window.toggleLanguage = function() {
    const nextLang = window.currentLang === 'nl' ? 'en' : 'nl';
    window.loadLanguage(nextLang);
};

function updateSwitchVisuals() {
    const theme = localStorage.getItem('theme') || 'dark';
    const lang = window.currentLang;

    const themeDot = document.getElementById('theme-dot');
    if (themeDot) {
        themeDot.style.transform = theme === 'light' ? 'translateX(24px)' : 'translateX(0px)';
    }

    const langDot = document.getElementById('lang-dot');
    if (langDot) {
        langDot.style.transform = lang === 'en' ? 'translateX(24px)' : 'translateX(0px)';
    }
}

// GEFIXTE SCHONE THEME TOGGLE (Zonder inline text-color overschrijvingen)
window.applyThemeStyles = function(theme) {
    const html = document.documentElement;
    const body = document.querySelector('body');
    const appContainer = document.querySelector('.app-container');
    const cards = document.querySelectorAll('.app-card');
    const inputsAndButtons = document.querySelectorAll('.app-input, #goal, #goal option, #btn-start_btn, #btn-add_file, #btn-add_water');
    const switches = document.querySelectorAll('.switch-bg');
    const progressTrackers = document.querySelectorAll('.w-full.bg-white\\/5, .w-full.bg-white\\/10');
    const graphBackgroundBars = document.querySelectorAll('.bg-white\\/5.w-7');

    if (theme === 'light') {
        html.classList.remove('dark');
        if (body) { body.style.backgroundColor = '#f3f4f6'; body.style.color = '#1e293b'; }
        if (appContainer) { appContainer.style.backgroundColor = '#ffffff'; appContainer.style.borderColor = '#e2e8f0'; }
        cards.forEach(c => { c.style.backgroundColor = '#f8fafc'; c.style.borderColor = '#e2e8f0'; });
        
        inputsAndButtons.forEach(i => {
            i.style.backgroundColor = '#f1f5f9';
            i.style.color = '#1e293b';
            i.style.borderColor = '#cbd5e1';
        });

        switches.forEach(s => s.style.backgroundColor = '#cbd5e1');
        progressTrackers.forEach(p => p.style.backgroundColor = '#cbd5e1');
        graphBackgroundBars.forEach(b => b.style.backgroundColor = '#cbd5e1');
    } else {
        html.classList.add('dark');
        if (body) { body.style.backgroundColor = '#030213'; body.style.color = '#ffffff'; }
        if (appContainer) { appContainer.style.backgroundColor = '#0e0d1f'; appContainer.style.borderColor = 'rgba(255,255,255,0.1)'; }
        cards.forEach(c => { c.style.backgroundColor = '#15142b'; c.style.borderColor = 'rgba(255,255,255,0.05)'; });
        
        inputsAndButtons.forEach(i => {
            i.style.backgroundColor = '#15142b';
            i.style.color = '#ffffff';
            i.style.borderColor = 'rgba(255,255,255,0.1)';
        });

        switches.forEach(s => s.style.backgroundColor = 'rgba(255,255,255,0.1)');
        progressTrackers.forEach(p => p.style.backgroundColor = 'rgba(255,255,255,0.05)');
        graphBackgroundBars.forEach(b => b.style.backgroundColor = 'rgba(255,255,255,0.05)');
    }
    updateSwitchVisuals();
};

window.toggleTheme = function() {
    const currentTheme = localStorage.getItem('theme') || 'dark';
    const nextTheme = currentTheme === 'dark' ? 'light' : 'dark';
    localStorage.setItem('theme', nextTheme);
    window.applyThemeStyles(nextTheme);
};

document.addEventListener('DOMContentLoaded', () => {
    window.loadLanguage(window.currentLang);
    setTimeout(() => {
        window.applyThemeStyles(localStorage.getItem('theme') || 'dark');
    }, 60);
});