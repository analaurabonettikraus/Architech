<?php
$pageTitle = 'Dashboard';
ob_start();
?>

<div class="w-full min-h-screen bg-gradient-to-b from-[#4d8ea2] to-[#094174] p-8">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-white text-4xl font-bold font-pixelify tracking-wider">Dashboard</h1>
                <p class="text-white/80 mt-2">Bem-vindo, <?php echo htmlspecialchars($user['name']); ?>!</p>
            </div>
            <a href="<?php echo APP_URL; ?>/logout" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg transition btn-tactile">
                Sair
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="glass-effect p-6 rounded-xl">
                <h3 class="text-white font-bold text-lg mb-2">Exercícios</h3>
                <p class="text-white/80">0 exercícios concluídos</p>
            </div>
            <div class="glass-effect p-6 rounded-xl">
                <h3 class="text-white font-bold text-lg mb-2">Projetos</h3>
                <p class="text-white/80">0 projetos criados</p>
            </div>
            <div class="glass-effect p-6 rounded-xl">
                <h3 class="text-white font-bold text-lg mb-2">Pontos</h3>
                <p class="text-white/80">0 pontos acumulados</p>
            </div>
            <div class="glass-effect p-6 rounded-xl">
                <h3 class="text-white font-bold text-lg mb-2">Nível</h3>
                <p class="text-white/80">Iniciante</p>
            </div>
        </div>

        <div class="glass-effect p-8 rounded-xl">
            <h2 class="text-white text-2xl font-bold mb-6">Informações do Perfil</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-white/80 text-sm mb-2">Nome</label>
                    <p class="text-white text-lg"><?php echo htmlspecialchars($user['name']); ?></p>
                </div>
                <div>
                    <label class="block text-white/80 text-sm mb-2">Email</label>
                    <p class="text-white text-lg"><?php echo htmlspecialchars($user['email']); ?></p>
                </div>
                <div class="mt-6">
                    <a href="<?php echo APP_URL; ?>/profile" class="px-6 py-3 bg-[#084176] hover:bg-[#0a5a9e] text-white font-bold rounded-lg transition btn-tactile inline-block">
                        Editar Perfil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include VIEWS_DIR . '/layouts/base.php';
?>
