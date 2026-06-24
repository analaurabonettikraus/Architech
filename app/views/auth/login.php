<?php
$pageTitle = 'Login';
ob_start();
?>

<div class="w-full min-h-screen flex items-center justify-center bg-gradient-to-b from-[#4d8ea2] to-[#094174]">
    <div class="w-full max-w-md">
        <div class="glass-effect p-8 rounded-2xl">
            <div class="text-center mb-8">
                <h1 class="text-white text-4xl font-bold font-pixelify tracking-wider mb-2">ARCHITECH</h1>
                <p class="text-white/80">Bem-vindo de volta!</p>
            </div>

            <form method="POST" action="<?php echo APP_URL; ?>/login" class="space-y-6">
                <div>
                    <label class="block text-white text-sm font-semibold mb-2">Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/50 focus:outline-none focus:border-white/50 transition" placeholder="seu@email.com">
                </div>

                <div>
                    <label class="block text-white text-sm font-semibold mb-2">Senha</label>
                    <input type="password" name="password" required class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/50 focus:outline-none focus:border-white/50 transition" placeholder="••••••••">
                </div>

                <button type="submit" class="w-full py-3 bg-[#084176] hover:bg-[#0a5a9e] text-white font-bold rounded-lg transition btn-tactile">
                    Entrar
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-white/80">Não possui conta? <a href="<?php echo APP_URL; ?>/register" class="text-white font-bold hover:underline">Cadastre-se</a></p>
            </div>

            <div class="mt-6 text-center">
                <a href="<?php echo APP_URL; ?>/" class="text-white/80 hover:text-white transition">← Voltar para home</a>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include VIEWS_DIR . '/layouts/base.php';
?>
