<!DOCTYPE html>
<html lang="nl" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitVault - Onboarding</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-[#030213] text-white min-h-screen flex items-center justify-center p-4 antialiased selection:bg-amber-500/30 transition-colors duration-300">

    <div class="app-container w-full max-w-md bg-[#0e0d1f] border border-white/10 rounded-[40px] shadow-2xl p-6 relative flex flex-col justify-between h-[840px] transition-all duration-300">
        
        <div class="text-center mt-8">
            <div class="flex items-center justify-center gap-2 mb-2">
                <span class="text-amber-500 text-2xl">⚡</span>
                <span class="font-black text-2xl tracking-wider app-text">FITVAULT</span>
            </div>
            <h1 class="text-xl font-bold mt-4 app-text" id="txt-welcome">Welcome to FitVault</h1>
            <p class="text-sm text-gray-400 mt-1" id="txt-onboarding_subtitle">Quickly set your goals to start tracking.</p>
        </div>

        <form id="onboardingForm" class="flex-1 flex flex-col justify-center space-y-5 my-4 px-2">
            <div class="space-y-1.5">
                <label class="text-xs font-semibold uppercase tracking-wider text-gray-400" id="lbl-your_name">Your Name</label>
                <input type="text" id="username" required class="app-input w-full bg-[#15142b] border border-white/10 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-amber-500 transition-colors" placeholder="e.g. John">
            </div>

            <div class="space-y-1.5">
                <label class="text-xs font-semibold uppercase tracking-wider text-gray-400" id="lbl-choose_goal">Choose your main goal</label>
                <div class="relative">
                    <select id="goal" class="app-input w-full bg-[#15142b] border border-white/10 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-amber-500 transition-colors appearance-none cursor-pointer">
                        <option value="lose" id="txt-lose_weight">Lose Weight (Less kcal)</option>
                        <option value="gain" id="txt-gain_weight">Gain Weight (More kcal)</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">🔽</div>
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="text-xs font-semibold uppercase tracking-wider text-gray-400" id="lbl-protein_goal">Daily Protein Goal (grams)</label>
                <input type="number" id="proteinGoal" value="150" required class="app-input w-full bg-[#15142b] border border-white/10 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-amber-500 transition-colors">
            </div>

            <div class="space-y-1.5">
                <label class="text-xs font-semibold uppercase tracking-wider text-gray-400" id="lbl-step_goal">Daily Step Goal</label>
                <input type="number" id="stepGoal" value="10000" required class="app-input w-full bg-[#15142b] border border-white/10 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-amber-500 transition-colors">
            </div>

            <button type="submit" id="btn-start_btn" class="app-input w-full bg-[#15142b] border border-white/10 text-white font-black py-4 rounded-2xl text-sm transition-all active:scale-95 cursor-pointer mt-4 hover:opacity-80">
                Start Your Journey 🚀
            </button>
        </form>

        <div class="flex items-center justify-between px-6 pb-4">
            <div class="flex items-center gap-2 cursor-pointer select-none" onclick="toggleLanguage()">
                <span class="text-xs font-bold text-gray-400">NL</span>
                <div class="switch-bg w-12 h-6 bg-white/10 rounded-full p-0.5 relative transition-colors duration-300">
                    <div id="lang-dot" class="w-5 h-5 bg-amber-500 rounded-full transition-transform duration-300 absolute left-0.5 top-0.5"></div>
                </div>
                <span class="text-xs font-bold text-gray-400">EN</span>
            </div>

            <div class="flex items-center gap-2 cursor-pointer select-none" onclick="toggleTheme()">
                <span class="text-xs font-bold text-gray-400">🌙</span>
                <div class="switch-bg w-12 h-6 bg-white/10 rounded-full p-0.5 relative transition-colors duration-300">
                    <div id="theme-dot" class="w-5 h-5 bg-amber-500 rounded-full transition-transform duration-300 absolute left-0.5 top-0.5"></div>
                </div>
                <span class="text-xs font-bold text-gray-400">☀️</span>
            </div>
        </div>
    </div>

    <script src="js/app.js"></script>
    <script>
        if (localStorage.getItem('fitvault_user')) {
            window.location.href = 'pages/dashboard.php';
        }

        document.getElementById('onboardingForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const goal = document.getElementById('goal').value;
            const proteinGoal = document.getElementById('proteinGoal').value;
            const stepGoal = document.getElementById('stepGoal').value;
            const caloriesGoal = goal === 'lose' ? 2000 : 3000;

            const userData = {
                name: username,
                goal: goal,
                caloriesGoal: caloriesGoal,
                proteinGoal: parseInt(proteinGoal),
                stepGoal: parseInt(stepGoal)
            };

            localStorage.setItem('fitvault_user', JSON.stringify(userData));
            window.location.href = 'pages/dashboard.php';
        });
    </script>
</body>
</html>