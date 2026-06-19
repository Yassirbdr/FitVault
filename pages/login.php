<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitVault - Welkom</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0b0f19] min-h-screen flex items-center justify-center p-4 antialiased transition-colors duration-300" id="body-bg">

    <!-- Mobiele Container (Telefoon look) -->
    <div class="w-full max-w-md bg-[#0f172a] border border-slate-800 rounded-[40px] shadow-2xl p-8 overflow-hidden relative" id="app-card">
        
        <!-- Logo / Titel -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 bg-amber-500/10 rounded-2xl mb-3 text-amber-500 font-bold text-2xl">
                ⚡
            </div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight" id="txt-welcome">Welkom bij FitVault</h1>
            <p class="text-slate-400 text-sm mt-2" id="txt-subtitle">Stel snel je doelen in om te beginnen met tracken.</p>
        </div>

        <!-- Formulier -->
        <form id="onboardingForm" class="space-y-6">
            <!-- Naam Invoer -->
            <div>
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2" id="lbl-name">Jouw Naam</label>
                <input type="text" id="username" required placeholder="bijv. Yassir" 
                    class="w-full bg-[#1e293b] border border-slate-700 rounded-2xl px-4 py-3.5 text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 transition-colors">
            </div>

            <!-- Hoofddoel Kiezen -->
            <div>
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2" id="lbl-goal">Kies je hoofddoel</label>
                <select id="goal" class="w-full bg-[#1e293b] border border-slate-700 rounded-2xl px-4 py-3.5 text-white focus:outline-none focus:border-blue-500 transition-colors">
                    <option value="lose" id="opt-lose">Afvallen (Minder kcal)</option>
                    <option value="gain" id="opt-gain">Aankomen (Meer kcal)</option>
                </select>
            </div>

            <!-- Overige Doelen Grid -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2" id="lbl-protein">Eiwitdoel (g)</label>
                    <input type="number" id="proteinGoal" required value="150" 
                        class="w-full bg-[#1e293b] border border-slate-700 rounded-2xl px-4 py-3.5 text-white focus:outline-none focus:border-blue-500 transition-colors">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2" id="lbl-steps">Stappendoel</label>
                    <input type="number" id="stepGoal" required value="10000" 
                        class="w-full bg-[#1e293b] border border-slate-700 rounded-2xl px-4 py-3.5 text-white focus:outline-none focus:border-blue-500 transition-colors">
                </div>
            </div>

            <!-- Start Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold py-4 rounded-2xl shadow-lg shadow-blue-500/20 active:scale-[0.98] transition-transform duration-100 mt-4 text-center block" id="btn-start">
                Start Jouw Reis 🚀
            </button>
        </form>
    </div>

    <!-- Simpele script om data tijdelijk op te slaan -->
    <script>
        document.getElementById('onboardingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value;
            const goal = document.getElementById('goal').value;
            const protein = document.getElementById('proteinGoal').value;
            const steps = document.getElementById('stepGoal').value;
            
            // Bepaal kcal op basis van het gekozen doel
            const calories = (goal === 'lose') ? 2000 : 3000;

            const userData = {
                name: username,
                goal: goal,
                caloriesGoal: calories,
                proteinGoal: protein,
                stepGoal: steps
            };

            // Opslaan in localStorage
            localStorage.setItem('fitvault_user', JSON.stringify(userData));
            
            // Direct doorsturen naar het dashboard!
            window.location.href = 'dashboard.php';
        });
    </script>
</body>
</html>