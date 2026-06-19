<!DOCTYPE html>
<html lang="nl" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitVault - Analyse</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/app.js"></script>
</head>
<body class="bg-[#030213] min-h-screen flex items-center justify-center p-4 antialiased transition-colors duration-300">

    <div class="app-container w-full max-w-md bg-[#0e0d1f] border border-white/10 rounded-[40px] shadow-2xl p-6 relative flex flex-col justify-between h-[840px] transition-all duration-300">
        
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2">
                <span class="text-amber-500 text-xl">⚡</span>
                <span class="font-black text-xl tracking-wider app-text">FITVAULT</span>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-1 cursor-pointer select-none" onclick="toggleLanguage()">
                    <span class="text-[10px] font-bold text-gray-400">NL</span>
                    <div class="switch-bg w-10 h-5 bg-white/10 rounded-full p-0.5 relative transition-colors duration-300">
                        <div id="lang-dot" class="w-4 h-4 bg-amber-500 rounded-full transition-transform duration-300 absolute left-0.5 top-0.5"></div>
                    </div>
                    <span class="text-[10px] font-bold text-gray-400">EN</span>
                </div>

                <div class="flex items-center gap-1 cursor-pointer select-none" onclick="toggleTheme()">
                    <span class="text-[10px] font-bold text-gray-400">🌙</span>
                    <div class="switch-bg w-10 h-5 bg-white/10 rounded-full p-0.5 relative transition-colors duration-300">
                        <div id="theme-dot" class="w-4 h-4 bg-amber-500 rounded-full transition-transform duration-300 absolute left-0.5 top-0.5"></div>
                    </div>
                    <span class="text-[10px] font-bold text-gray-400">☀️</span>
                </div>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto space-y-6 pr-1" style="scrollbar-width: none; -ms-overflow-style: none;">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl font-black tracking-tight app-text" id="nav-analytics">Analyse</h1>
                    <p class="text-xs text-gray-400 mt-0.5" id="txt-analytics_subtitle">Weekly summary</p>
                </div>
                <button onclick="resetAccount()" id="btn-reset_account" class="bg-red-500/10 hover:bg-red-500/20 text-red-400 text-[10px] font-bold px-2.5 py-1.5 rounded-xl border border-red-500/20 transition-all cursor-pointer flex items-center gap-1">
                    🔄 Reset Account
                </button>
            </div>

            <div class="app-card bg-[#15142b] border border-white/5 rounded-[32px] p-6 shadow-inner transition-all duration-300">
                <div class="flex justify-between items-center mb-8">
                    <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider app-text" id="txt-daily_summary">Calorieën overzicht</h3>
                    <span class="text-xs font-black text-amber-500 bg-amber-500/10 px-3 py-1 rounded-full" id="avg-kcal">Gem. 0 kcal</span>
                </div>

                <div class="h-48 flex items-end justify-between px-2 relative border-b border-white/10 pb-1">
                    <div class="absolute inset-x-0 top-4 border-t border-dashed border-white/5 pointer-events-none"></div>
                    <div class="absolute inset-x-0 top-20 border-t border-dashed border-white/5 pointer-events-none"></div>
                    <div class="absolute inset-x-0 top-36 border-t border-dashed border-white/5 pointer-events-none"></div>

                    <div class="flex flex-col items-center gap-2 w-full group">
                        <span class="text-[9px] text-gray-400 font-bold opacity-0 group-hover:opacity-100 transition-opacity duration-200">1850</span>
                        <div class="bg-white/5 w-8 h-32 rounded-2xl relative overflow-hidden shadow-inner">
                            <div class="bg-gradient-to-t from-amber-600 to-amber-400 absolute bottom-0 left-0 right-0 h-[55%] rounded-2xl shadow-[0_0_15px_rgba(245,158,11,0.3)] transition-all duration-500"></div>
                        </div>
                        <span class="text-[10px] text-gray-500 font-bold mt-1">MA</span>
                    </div>

                    <div class="flex flex-col items-center gap-2 w-full group">
                        <span class="text-[9px] text-gray-400 font-bold opacity-0 group-hover:opacity-100 transition-opacity duration-200">2100</span>
                        <div class="bg-white/5 w-8 h-32 rounded-2xl relative overflow-hidden shadow-inner">
                            <div class="bg-gradient-to-t from-amber-600 to-amber-400 absolute bottom-0 left-0 right-0 h-[70%] rounded-2xl shadow-[0_0_15px_rgba(245,158,11,0.3)] transition-all duration-500"></div>
                        </div>
                        <span class="text-[10px] text-gray-500 font-bold mt-1">DI</span>
                    </div>

                    <div class="flex flex-col items-center gap-2 w-full group">
                        <span class="text-[9px] text-gray-400 font-bold opacity-0 group-hover:opacity-100 transition-opacity duration-200">1600</span>
                        <div class="bg-white/5 w-8 h-32 rounded-2xl relative overflow-hidden">
                            <div class="bg-gradient-to-t from-amber-600 to-amber-400 absolute bottom-0 left-0 right-0 h-[45%] rounded-2xl shadow-[0_0_15px_rgba(245,158,11,0.3)] transition-all duration-500"></div>
                        </div>
                        <span class="text-[10px] text-gray-500 font-bold mt-1">WO</span>
                    </div>

                    <div class="flex flex-col items-center gap-2 w-full group">
                        <span class="text-[10px] text-amber-500 font-black tracking-wide transition-all" id="today-kcal-label">0</span>
                        <div class="bg-white/5 w-8 h-32 rounded-2xl relative overflow-hidden shadow-inner ring-2 ring-amber-500/20">
                            <div id="today-bar" class="bg-gradient-to-t from-amber-500 via-amber-400 to-yellow-300 absolute bottom-0 left-0 right-0 h-[0%] rounded-2xl shadow-[0_0_20px_rgba(245,158,11,0.5)] transition-all duration-500"></div>
                        </div>
                        <span class="text-[10px] text-amber-500 font-black tracking-wider mt-1">VR</span>
                    </div>

                    <div class="flex flex-col items-center gap-2 w-full">
                        <span class="text-[9px] text-transparent select-none">0</span>
                        <div class="bg-white/5 w-8 h-32 rounded-2xl relative overflow-hidden shadow-inner"></div>
                        <span class="text-[10px] text-gray-500 font-bold mt-1">ZA</span>
                    </div>

                    <div class="flex flex-col items-center gap-2 w-full">
                        <span class="text-[9px] text-transparent select-none">0</span>
                        <div class="bg-white/5 w-8 h-32 rounded-2xl relative overflow-hidden shadow-inner"></div>
                        <span class="text-[10px] text-gray-500 font-bold mt-1">ZO</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-around border-t border-white/10 pt-4 mt-2">
            <a href="dashboard.php" class="flex flex-col items-center gap-1 text-gray-400 text-xs font-medium hover:opacity-80 transition-colors">
                <span class="text-lg">🏠</span>
                <span id="nav-dashboard">Dashboard</span>
            </a>
            <a href="log.php" class="flex flex-col items-center gap-1 text-gray-400 text-xs font-medium hover:opacity-80 transition-colors">
                <span class="text-lg">📝</span>
                <span id="nav-logbook">Logboek</span>
            </a>
            <a href="analytics.php" class="flex flex-col items-center gap-1 app-text font-bold text-xs transition-colors">
                <span class="text-lg">📊</span>
                <span id="nav-analytics">Analyse</span>
            </a>
        </div>
    </div>

    <script>
        function resetAccount() {
            if(confirm("Weet je zeker dat je je account wilt resetten?")) {
                localStorage.clear();
                window.location.href = '../index.php';
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const user = JSON.parse(localStorage.getItem('fitvault_user'));
            if (!user) {
                window.location.href = '../index.php';
                return;
            }

            const meals = JSON.parse(localStorage.getItem('fitvault_meals')) || [];
            let totalKcal = 0;
            meals.forEach(m => totalKcal += parseInt(m.kcal || 0));

            const pct = Math.min((totalKcal / user.caloriesGoal) * 100, 100);
            const todayBar = document.getElementById('today-bar');
            if(todayBar) {
                todayBar.style.height = `${pct}%`;
            }

            document.getElementById('today-kcal-label').innerText = totalKcal;
            document.getElementById('avg-kcal').innerText = `Vandaag: ${totalKcal} kcal`;
        });
    </script>
</body>
</html>