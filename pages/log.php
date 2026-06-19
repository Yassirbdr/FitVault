<!DOCTYPE html>
<html lang="nl" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitVault - Logboek</title>
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
                    <h1 class="text-2xl font-black tracking-tight app-text" id="nav-logbook">Logboek</h1>
                    <p class="text-xs text-gray-400 mt-0.5" id="txt-today">Today</p>
                </div>
                <button onclick="resetAccount()" id="btn-reset_account" class="bg-red-500/10 hover:bg-red-500/20 text-red-400 text-[10px] font-bold px-2.5 py-1.5 rounded-xl border border-red-500/20 transition-all cursor-pointer flex items-center gap-1">
                    🔄 Reset Account
                </button>
            </div>

            <div class="app-card bg-[#15142b] border border-white/5 rounded-[32px] p-5 space-y-4 shadow-inner transition-all duration-300">
                <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider pl-1 app-text" id="txt-daily_summary">Voeg maaltijd toe</h3>
                <form id="mealForm" class="space-y-3">
                    <input type="text" id="mealName" required class="app-input w-full bg-[#15142b] border border-white/10 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-amber-500 transition-colors" placeholder="bv. Kip met rijst">
                    <div class="grid grid-cols-2 gap-3">
                        <input type="number" id="mealKcal" required class="app-input w-full bg-[#15142b] border border-white/10 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-amber-500 transition-colors" placeholder="kcal">
                        <input type="number" id="mealProtein" required class="app-input w-full bg-[#15142b] border border-white/10 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-amber-500 transition-colors" placeholder="eiwit (g)">
                    </div>
                    <button type="submit" id="btn-add_file" class="app-input w-full bg-[#15142b] border border-white/10 font-black py-3 rounded-xl text-xs transition-all active:scale-95 cursor-pointer hover:opacity-80">
                        Toevoegen
                    </button>
                </form>
            </div>

            <div class="app-card bg-[#15142b] border border-white/5 rounded-[32px] p-5 shadow-inner transition-all duration-300 flex justify-between items-center">
                <div>
                    <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider pl-1 app-text" id="txt-water_today">Water</h3>
                    <span class="text-sm font-black text-blue-400 pl-1 mt-1 block" id="water-val">0 ml</span>
                </div>
                <button onclick="addWater()" id="btn-add_water" class="app-input bg-[#15142b] border border-white/10 text-xs font-black px-4 py-3 rounded-xl transition-all active:scale-95 cursor-pointer hover:opacity-80">
                    + 250ml Water
                </button>
            </div>

            <div class="space-y-2">
                <div id="log-list" class="space-y-2"></div>
            </div>
        </div>

        <div class="flex items-center justify-around border-t border-white/10 pt-4 mt-2">
            <a href="dashboard.php" class="flex flex-col items-center gap-1 text-gray-400 text-xs font-medium hover:opacity-80 transition-colors">
                <span class="text-lg">🏠</span>
                <span id="nav-dashboard">Dashboard</span>
            </a>
            <a href="log.php" class="flex flex-col items-center gap-1 app-text font-bold text-xs transition-colors">
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

        function renderMeals() {
            const meals = JSON.parse(localStorage.getItem('fitvault_meals')) || [];
            const list = document.getElementById('log-list');
            list.innerHTML = '';
            
            meals.forEach((m, idx) => {
                const card = document.createElement('div');
                card.className = 'app-card bg-[#15142b] border border-white/5 rounded-2xl p-4 flex justify-between items-center';
                card.innerHTML = `
                    <div>
                        <span class="font-bold text-sm block app-text">${m.name}</span>
                        <span class="text-xs text-gray-400">${m.kcal} kcal • ${m.protein}g eiwit</span>
                    </div>
                    <button onclick="deleteMeal(${idx})" class="text-red-400 hover:text-red-500 text-sm">🗑️</button>
                `;
                list.appendChild(card);
            });

            const water = parseInt(localStorage.getItem('fitvault_water')) || 0;
            document.getElementById('water-val').innerText = `${water} ml`;
        }

        document.getElementById('mealForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const name = document.getElementById('mealName').value;
            const kcal = document.getElementById('mealKcal').value;
            const protein = document.getElementById('mealProtein').value;

            const meals = JSON.parse(localStorage.getItem('fitvault_meals')) || [];
            meals.push({ name, kcal, protein });
            localStorage.setItem('fitvault_meals', JSON.stringify(meals));

            document.getElementById('mealForm').reset();
            renderMeals();
        });

        function deleteMeal(idx) {
            const meals = JSON.parse(localStorage.getItem('fitvault_meals')) || [];
            meals.splice(idx, 1);
            localStorage.setItem('fitvault_meals', JSON.stringify(meals));
            renderMeals();
        }

        function addWater() {
            let water = parseInt(localStorage.getItem('fitvault_water')) || 0;
            water += 250;
            localStorage.setItem('fitvault_water', water);
            renderMeals();
        }

        document.addEventListener('DOMContentLoaded', () => {
            if (!localStorage.getItem('fitvault_user')) {
                window.location.href = '../index.php';
                return;
            }
            renderMeals();
        });
    </script>
</body>
</html>