<!DOCTYPE html>
<html lang="nl" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitVault - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/app.js"></script>
</head>
<body class="dynamic-bg min-h-screen flex items-center justify-center p-4 antialiased transition-colors duration-300">

    <div class="app-container dynamic-container w-full max-w-md border rounded-[40px] shadow-2xl p-6 relative flex flex-col justify-between h-[840px] transition-all duration-300">
        
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
                    <h1 class="text-2xl font-black tracking-tight app-text" id="welcome-user">FitVault User 👋</h1>
                    <p class="text-xs text-gray-400 mt-0.5" id="txt-today">Today</p>
                </div>
                <button onclick="resetAccount()" id="btn-reset_account" class="bg-red-500/10 hover:bg-red-500/20 text-red-400 text-[10px] font-bold px-2.5 py-1.5 rounded-xl border border-red-500/20 transition-all cursor-pointer flex items-center gap-1">
                    🔄 Reset Account
                </button>
            </div>

            <div class="app-card dynamic-card border rounded-[32px] p-6 flex flex-col items-center relative shadow-inner transition-all duration-300">
                <div class="relative w-52 h-52 flex items-center justify-center">
                    <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="44" stroke="rgba(255,255,255,0.05)" stroke-width="7" fill="transparent" />
                        <circle id="progress-circle" cx="50" cy="50" r="44" stroke="#f59e0b" stroke-width="7" fill="transparent" stroke-dasharray="276" stroke-dashoffset="276" stroke-linecap="round" class="transition-all duration-500" />
                    </svg>
                    <div class="absolute text-center flex flex-col items-center justify-center inset-0 p-4">
                        <span class="text-3xl font-black tracking-tight app-text" id="calories-left-val">0</span>
                        <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mt-1 block max-w-[110px] leading-tight" id="txt-calories_left">kcal over vandaag</span>
                    </div>
                </div>

                <div class="w-full grid grid-cols-2 gap-4 mt-6 pt-4 border-t border-white/5 text-center">
                    <div>
                        <span class="text-[10px] text-gray-400 font-medium block" id="txt-add_meal">Inname</span>
                        <span class="text-sm font-black text-amber-500 mt-0.5 block" id="calories-consumed">0 kcal</span>
                    </div>
                    <div class="border-l border-white/5">
                        <span class="text-[10px] text-gray-400 font-medium block" id="txt-calories_goal">Doel</span>
                        <span class="text-sm font-black app-text mt-0.5 block" id="calories-goal-val">0 kcal</span>
                    </div>
                </div>
            </div>

            <div class="app-card dynamic-card border rounded-[32px] p-5 space-y-4 shadow-inner transition-all duration-300">
                <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider pl-1 app-text" id="txt-macronutrients">Macronutriënten & Status</h3>
                
                <div class="space-y-4">
                    <div class="space-y-1">
                        <div class="flex justify-between text-xs font-bold px-1">
                            <span class="app-text">Eiwitten</span>
                            <span class="text-gray-400" id="protein-progress-val">0 / 150g</span>
                        </div>
                        <div class="w-full bg-white/5 h-2.5 rounded-full overflow-hidden">
                            <div id="protein-bar" class="bg-gradient-to-r from-amber-500 to-orange-500 h-full rounded-full transition-all duration-500" style="width: 0%"></div>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <div class="flex justify-between text-xs font-bold px-1">
                            <span class="app-text" id="txt-water_today">Water</span>
                            <span class="text-gray-400" id="water-progress-val">0 / 2000ml</span>
                        </div>
                        <div class="w-full bg-white/5 h-2.5 rounded-full overflow-hidden">
                            <div id="water-bar" class="bg-gradient-to-r from-blue-500 to-cyan-400 h-full rounded-full transition-all duration-500" style="width: 0%"></div>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <div class="flex justify-between text-xs font-bold px-1">
                            <span class="app-text" id="lbl-step_goal">Stappen</span>
                            <span class="text-gray-400" id="steps-progress-val">0 / 10000</span>
                        </div>
                        <div class="w-full bg-white/5 h-2.5 rounded-full overflow-hidden">
                            <div id="steps-bar" class="bg-gradient-to-r from-emerald-500 to-teal-400 h-full rounded-full transition-all duration-500" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-around border-t border-white/10 pt-4 mt-2">
            <a href="dashboard.php" class="flex flex-col items-center gap-1 app-text font-bold text-xs transition-colors">
                <span class="text-lg">🏠</span>
                <span id="nav-dashboard">Dashboard</span>
            </a>
            <a href="log.php" class="flex flex-col items-center gap-1 text-gray-400 text-xs font-medium hover:opacity-80 transition-colors">
                <span class="text-lg">📝</span>
                <span id="nav-logbook">Logboek</span>
            </a>
            <a href="analytics.php" class="flex flex-col items-center gap-1 text-gray-400 text-xs font-medium hover:opacity-80 transition-colors">
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
            const water = parseInt(localStorage.getItem('fitvault_water')) || 0;

            document.getElementById('welcome-user').innerText = `${user.name.toLowerCase()} 👋`;
            
            let totalKcal = 0;
            let totalProtein = 0;
            meals.forEach(m => {
                totalKcal += parseInt(m.kcal || 0);
                totalProtein += parseInt(m.protein || 0);
            });

            const kcalLeft = Math.max(user.caloriesGoal - totalKcal, 0);
            document.getElementById('calories-left-val').innerText = kcalLeft;
            document.getElementById('calories-consumed').innerText = `${totalKcal} kcal`;
            document.getElementById('calories-goal-val').innerText = `${user.caloriesGoal} kcal`;

            const circle = document.getElementById('progress-circle');
            const pct = Math.min(totalKcal / user.caloriesGoal, 1);
            const offset = 276 - (pct * 276);
            circle.style.strokeDashoffset = offset;

            document.getElementById('protein-progress-val').innerText = `${totalProtein} / ${user.proteinGoal}g`;
            const proteinPct = Math.min((totalProtein / user.proteinGoal) * 100, 100);
            document.getElementById('protein-bar').style.width = `${proteinPct}%`;

            document.getElementById('water-progress-val').innerText = `${water} / 2000ml`;
            const waterPct = Math.min((water / 2000) * 100, 100);
            document.getElementById('water-bar').style.width = `${waterPct}%`;

            const currentSteps = 4500; 
            document.getElementById('steps-progress-val').innerText = `${currentSteps} / ${user.stepGoal}`;
            const stepsPct = Math.min((currentSteps / user.stepGoal) * 100, 100);
            document.getElementById('steps-bar').style.width = `${stepsPct}%`;
        });
    </script>
</body>
</html>