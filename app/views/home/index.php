<?php
$pageTitle = 'Aprenda Programação de Forma Inteligente';
ob_start();

// Obter informações do usuário logado
$userStats = [];
if ($isLoggedIn) {
    require_once MODELS_DIR . '/User.php';
    $userModel = new User($pdo);
    $userStats = [
        'projects' => $userModel->countUserProjects($user['id']),
        'videos' => $userModel->countUserVideos($user['id']),
        'forumPosts' => $userModel->countUserForumPosts($user['id'])
    ];
}
?>

<div class="w-full min-h-screen flex items-center justify-center bg-gradient-to-b from-[#4d8ea2] to-[#094174] font-urbanist select-none overflow-x-hidden">
    <!-- Container principal 1440x1368 -->
    <div class="w-[1440px] h-[1368px] relative bg-gradient-to-b from-[#4d8ea2] to-[#094174] overflow-hidden shadow-2xl flex flex-col justify-between">
        
        <!-- ELEMENTOS DECORATIVOS ORBITAIS -->
        <!-- Tech Element (5-14.svg) - Coloque em: public/assets/5-14.svg -->
        <img data-node-id="5-14" class="absolute w-[131.07px] h-[141.48px] left-[467.42px] top-[314.12px] opacity-90 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] pointer-events-none animate-float-1" src="<?php echo APP_URL; ?>/assets/5-14.svg" alt="Tech Element">

        <!-- CSS3 (7-3.svg) - Coloque em: public/assets/7-3.svg -->
        <div data-node-id="7-4" class="absolute w-[80.92px] h-[80.92px] left-[1164.04px] top-[285.04px] origin-top-left rotate-3 opacity-40 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] pointer-events-none animate-float-2">
            <img data-node-id="7-3" class="w-[68.25px] h-[75.68px] left-[6.29px] top-[3.53px] absolute" src="<?php echo APP_URL; ?>/assets/7-3.svg" alt="CSS3">
        </div>

        <!-- Elemento decorativo azul (7-5) -->
        <div data-node-id="7-5" class="absolute w-[129.19px] h-[129.19px] left-[591px] top-[769px] origin-top-left rotate-[21deg] opacity-60 bg-[#2e6b8d] shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] pointer-events-none"></div>

        <!-- JavaScript (8-5.svg e 8-7.svg) - Coloque em: public/assets/8-5.svg e public/assets/8-7.svg -->
        <div data-node-id="8-9" class="absolute w-[97.15px] h-[97.15px] left-[1113.93px] top-[760.93px] origin-top-left rotate-[-13deg] opacity-75 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] pointer-events-none animate-float-3">
            <img data-node-id="8-7" class="absolute w-[97.15px] h-[97.15px] left-0 top-0" src="<?php echo APP_URL; ?>/assets/8-7.svg" alt="JS Background">
            <img data-node-id="8-5" class="absolute w-[97.15px] h-[97.15px] left-0 top-0" src="<?php echo APP_URL; ?>/assets/8-5.svg" alt="JS Logo">
        </div>

        <!-- HTML5 (8-11.svg) - Coloque em: public/assets/8-11.svg -->
        <div data-node-id="8-12" class="absolute w-[112.96px] h-[112.96px] left-[1190.25px] top-[490.51px] origin-top-left rotate-[25deg] opacity-75 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] pointer-events-none animate-float-4">
            <img data-node-id="8-11" class="w-[87.71px] h-[91.14px] left-[12.62px] top-[10.91px] absolute" src="<?php echo APP_URL; ?>/assets/8-11.svg" alt="HTML5">
        </div>

        <!-- BARRA DE NAVEGAÇÃO SUPERIOR -->
        <header class="absolute w-[1000px] h-[76px] left-[378px] top-[22px] z-20">
            <nav class="relative flex items-center justify-between w-full h-full glass-effect px-12 rounded-full">
                <!-- Indicador azul animado -->
                <div id="navIndicator" class="absolute w-[147px] h-[76px] left-[137px] top-0 bg-[#084176] rounded-full transition-all duration-300 ease-out" style="box-shadow: 0 4px 4px rgba(0,0,0,0.25);"></div>
                
                <div class="flex items-center justify-between w-full z-10">
                    <button onclick="handleNavClick('principal', this)" class="nav-btn text-white text-[20px] font-bold font-urbanist [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)] btn-tactile px-6 py-2 rounded-full transition-colors duration-300">Principal</button>
                    <button onclick="handleNavClick('exercicios', this)" class="nav-btn text-white text-[20px] font-bold font-urbanist [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)] btn-tactile hover:opacity-80 px-6 py-2 rounded-full transition-colors duration-300">Exercícios</button>
                    <button onclick="handleNavClick('sobre', this)" class="nav-btn text-white text-[20px] font-bold font-urbanist [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)] btn-tactile hover:opacity-80 px-6 py-2 rounded-full transition-colors duration-300">Sobre</button>
                    
                    <?php if ($isLoggedIn): ?>
                        <button onclick="window.location.href='<?php echo APP_URL; ?>/profile'" class="flex items-center gap-2 btn-tactile hover:opacity-80">
                            <span class="text-white text-[20px] font-bold font-urbanist [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)]">Olá, <?php echo htmlspecialchars($user['name']); ?></span>
                        </button>
                    <?php else: ?>
                        <button onclick="window.location.href='<?php echo APP_URL; ?>/login'" class="flex items-center gap-2 btn-tactile hover:opacity-80">
                            <img class="w-[20px] h-[20px] object-contain" src="<?php echo APP_URL; ?>/assets/232-1447.svg" alt="User Icon">
                            <span class="text-white text-[20px] font-bold font-urbanist [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)]">Login</span>
                        </button>
                    <?php endif; ?>
                </div>
            </nav>
        </header>

        <!-- MENU LATERAL ESQUERDO - Para todos (logado e não logado) -->
        <aside class="absolute left-[22px] top-[19px] w-[311px] h-[983px] z-20">
            <div class="absolute inset-0 glass-effect rounded-[40px]" style="box-shadow: 0 4px 4px rgba(0,0,0,0.25);"></div>
            
            <div class="absolute left-[128px] top-[32px] flex flex-col items-center gap-1 z-30">
                <img class="w-14 h-14 object-contain" src="<?php echo APP_URL; ?>/assets/53-89.webp" alt="Architech Logo">
                <span class="text-white text-center text-base font-semibold font-pixelify tracking-wider [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)]">ARCHITECH</span>
            </div>

            <div class="absolute left-[16px] top-[116px] w-[280px] flex flex-col gap-6 z-30">
                <!-- Indicador azul animado sidebar -->
                <div id="sidebarIndicator" class="absolute left-[16px] w-[280px] h-14 bg-[#084176] rounded-[32px] transition-all duration-300 ease-out" style="top: 0; box-shadow: 0 4px 4px rgba(0,0,0,0.25); z-index: 0;"></div>

                <button onclick="handleSidebarClick('perfil', this)" class="sidebar-btn w-full h-14 relative flex items-center px-6 rounded-[32px] overflow-hidden btn-tactile group z-10 transition-colors duration-300 <?php echo !$isLoggedIn ? 'opacity-50 cursor-not-allowed' : ''; ?>" <?php echo !$isLoggedIn ? 'disabled' : ''; ?>>
                    <div class="absolute inset-0 opacity-20 bg-white/40 group-hover:opacity-30 transition-opacity rounded-[32px]"></div>
                    <div class="relative flex items-center gap-4 z-10">
                        <img class="w-[21.67px] h-[21.67px] object-contain shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]" src="<?php echo APP_URL; ?>/assets/8-19.svg" alt="Perfil">
                        <span class="text-white text-[18px] font-bold [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)]">Perfil</span>
                    </div>
                </button>

                <button onclick="handleSidebarClick('projetos', this)" class="sidebar-btn w-full h-14 relative flex items-center px-6 rounded-[32px] overflow-hidden btn-tactile group z-10 transition-colors duration-300 <?php echo !$isLoggedIn ? 'opacity-50 cursor-not-allowed' : ''; ?>" <?php echo !$isLoggedIn ? 'disabled' : ''; ?>>
                    <div class="absolute inset-0 opacity-20 bg-white/40 group-hover:opacity-30 transition-opacity rounded-[32px]"></div>
                    <div class="relative flex items-center gap-4 z-10">
                        <img class="w-[21.67px] h-[21.67px] object-contain shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]" src="<?php echo APP_URL; ?>/assets/8-24.svg" alt="Projetos">
                        <span class="text-white text-[18px] font-bold [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)]">Meus projetos</span>
                    </div>
                </button>

                <button onclick="handleSidebarClick('videoaulas', this)" class="sidebar-btn w-full h-14 relative flex items-center px-6 rounded-[32px] overflow-hidden btn-tactile group z-10 transition-colors duration-300 <?php echo !$isLoggedIn ? 'opacity-50 cursor-not-allowed' : ''; ?>" <?php echo !$isLoggedIn ? 'disabled' : ''; ?>>
                    <div class="absolute inset-0 opacity-20 bg-white/40 group-hover:opacity-30 transition-opacity rounded-[32px]"></div>
                    <div class="relative flex items-center gap-4 z-10">
                        <img class="w-[21.67px] h-[17.56px] object-contain shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]" src="<?php echo APP_URL; ?>/assets/8-29.svg" alt="Videoaulas">
                        <span class="text-white text-[18px] font-bold [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)]">Vídeoaulas</span>
                    </div>
                </button>

                <button onclick="handleSidebarClick('ia', this)" class="sidebar-btn w-full h-14 relative flex items-center px-6 rounded-[32px] overflow-hidden btn-tactile group z-10 transition-colors duration-300 <?php echo !$isLoggedIn ? 'opacity-50 cursor-not-allowed' : ''; ?>" <?php echo !$isLoggedIn ? 'disabled' : ''; ?>>
                    <div class="absolute inset-0 opacity-20 bg-white/40 group-hover:opacity-30 transition-opacity rounded-[32px]"></div>
                    <div class="relative flex items-center gap-4 z-10">
                        <img class="w-6 h-[23.24px] object-contain shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]" src="<?php echo APP_URL; ?>/assets/16-12.svg" alt="IA">
                        <span class="text-white text-[18px] font-bold [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)]">Nossa IA</span>
                    </div>
                </button>

                <button onclick="handleSidebarClick('forum', this)" class="sidebar-btn w-full h-14 relative flex items-center px-6 rounded-[32px] overflow-hidden btn-tactile group z-10 transition-colors duration-300 <?php echo !$isLoggedIn ? 'opacity-50 cursor-not-allowed' : ''; ?>" <?php echo !$isLoggedIn ? 'disabled' : ''; ?>>
                    <div class="absolute inset-0 opacity-20 bg-white/40 group-hover:opacity-30 transition-opacity rounded-[32px]"></div>
                    <div class="relative flex items-center gap-4 z-10">
                        <img class="w-[18px] h-[18px] object-contain" src="<?php echo APP_URL; ?>/assets/16-23.svg" alt="Fórum">
                        <span class="text-white text-[18px] font-bold [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)]">Fórum</span>
                    </div>
                </button>

                <?php if ($isLoggedIn): ?>
                <button onclick="handleSidebarClick('logout', this)" class="sidebar-btn w-full h-14 relative flex items-center px-6 rounded-[32px] overflow-hidden btn-tactile group z-10 transition-colors duration-300 mt-4">
                    <div class="absolute inset-0 opacity-20 bg-red-500/40 group-hover:opacity-30 transition-opacity rounded-[32px]"></div>
                    <div class="relative flex items-center gap-4 z-10">
                        <span class="text-white text-[18px] font-bold [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)]">Sair</span>
                    </div>
                </button>
                <?php endif; ?>
            </div>
        </aside>

        <!-- CONTEÚDO CENTRAL -->
        <main class="absolute left-[378px] top-[116px] w-[1000px] h-[950px] flex items-center justify-center z-10">
            <?php if ($isLoggedIn): ?>
                <!-- Conteúdo para usuário logado -->
                <div class="text-center">
                    <h1 class="text-white text-[60px] font-semibold font-pixelify tracking-wider [text-shadow:_0px_8px_16px_rgba(0,0,0,0.4)] select-none mb-8">BEM-VINDO!</h1>
                    
                    <div class="grid grid-cols-3 gap-8 mt-12">
                        <div class="glass-effect p-8 rounded-2xl">
                            <div class="text-[48px] font-bold text-white font-pixelify mb-2"><?php echo $userStats['projects']; ?></div>
                            <div class="text-white/80 text-[18px]">Projetos</div>
                        </div>
                        <div class="glass-effect p-8 rounded-2xl">
                            <div class="text-[48px] font-bold text-white font-pixelify mb-2"><?php echo $userStats['videos']; ?></div>
                            <div class="text-white/80 text-[18px]">Videoaulas</div>
                        </div>
                        <div class="glass-effect p-8 rounded-2xl">
                            <div class="text-[48px] font-bold text-white font-pixelify mb-2"><?php echo $userStats['forumPosts']; ?></div>
                            <div class="text-white/80 text-[18px]">Posts no Fórum</div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <!-- Conteúdo para usuário não logado -->
                <div class="text-center">
                    <h1 class="text-white text-[80px] font-semibold font-pixelify tracking-wider [text-shadow:_0px_8px_16px_rgba(0,0,0,0.4)] select-none">ARCHITECH</h1>
                    <p class="text-white/80 text-[24px] font-urbanist mt-4 [text-shadow:_0px_4px_4px_rgba(0,0,0,0.25)]">Aprenda Programação de Forma Inteligente</p>
                </div>
            <?php endif; ?>
        </main>

        <!-- RODAPÉ -->
        <footer class="absolute left-[113px] top-[1111px] w-[1214px] h-[211px] z-20">
            <div class="absolute inset-0 glass-effect rounded-[110px]"></div>

            <div class="absolute left-[104px] top-[16px] flex flex-col items-center z-30">
                <img class="w-[155px] h-[155px] object-contain drop-shadow-xl" src="<?php echo APP_URL; ?>/assets/53-81.webp" alt="Logo 3D">
                <span class="text-white text-xl font-semibold font-pixelify tracking-widest mt-[-10px] [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)]">ARCHITECH</span>
            </div>

            <div class="absolute left-[327px] top-[16px] w-[1px] h-[186px] bg-[#094174]/50 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] z-30"></div>

            <div class="absolute left-[397px] top-[59px] flex items-center justify-around w-[434px] h-[69px] glass-effect px-6 z-30 rounded-full">
                <button onclick="handleFooterClick('principal')" class="text-white text-[20px] font-bold font-urbanist [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)] btn-tactile hover:opacity-80">Principal</button>
                <button onclick="handleFooterClick('exercicios')" class="text-white text-[20px] font-bold font-urbanist [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)] btn-tactile hover:opacity-80">Exercícios</button>
                <button onclick="handleFooterClick('sobre')" class="text-white text-[20px] font-bold font-urbanist [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)] btn-tactile hover:opacity-80">Sobre</button>
            </div>

            <div class="absolute right-[119px] top-[72px] flex flex-col items-end gap-2 z-30">
                <div class="flex items-center gap-6">
                    <a href="https://twitter.com" target="_blank" class="w-[45px] h-[45px] flex items-center justify-center bg-white/10 hover:bg-white/20 rounded-full transition-colors shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">
                        <img class="w-[24px] h-[24px] object-contain" src="<?php echo APP_URL; ?>/assets/28-116.svg" alt="Twitter">
                    </a>
                    <a href="https://instagram.com" target="_blank" class="w-[45px] h-[45px] flex items-center justify-center bg-white/10 hover:bg-white/20 rounded-full transition-colors shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">
                        <img class="w-[24px] h-[24px] object-contain" src="<?php echo APP_URL; ?>/assets/28-112.svg" alt="Instagram">
                    </a>
                    <a href="https://github.com" target="_blank" class="w-[45px] h-[45px] flex items-center justify-center bg-white/10 hover:bg-white/20 rounded-full transition-colors shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">
                        <img class="w-[24px] h-[24px] object-contain" src="<?php echo APP_URL; ?>/assets/23-38.svg" alt="GitHub">
                    </a>
                </div>
                <span class="text-white text-sm font-bold font-urbanist [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)] mt-2">Suporte: architech.dev@gmail.com</span>
                <span class="text-white text-sm font-bold font-urbanist [text-shadow:_0px_4px_4px_rgb(0_0_0_/_0.25)]">© Architech. Todos os direitos reservados.</span>
            </div>
        </footer>
    </div>
</div>

<script>
// Rastrear o botão ativo na navegação
let activeNavBtn = document.querySelector('.nav-btn');
let activeSidebarBtn = document.querySelector('.sidebar-btn:not(:disabled)');

function updateNavIndicator() {
    const indicator = document.getElementById('navIndicator');
    const activeBtn = document.querySelector('.nav-btn.active');
    
    if (activeBtn) {
        const rect = activeBtn.getBoundingClientRect();
        const navRect = activeBtn.parentElement.getBoundingClientRect();
        const relativeLeft = rect.left - navRect.left;
        
        indicator.style.left = relativeLeft + 'px';
        indicator.style.width = rect.width + 'px';
    }
}

function updateSidebarIndicator() {
    const indicator = document.getElementById('sidebarIndicator');
    const activeBtn = document.querySelector('.sidebar-btn.active');
    
    if (activeBtn) {
        const rect = activeBtn.getBoundingClientRect();
        const sidebarContainer = activeBtn.parentElement;
        const relativeTop = activeBtn.offsetTop;
        
        indicator.style.top = relativeTop + 'px';
        indicator.style.height = activeBtn.offsetHeight + 'px';
    }
}

function handleNavClick(section, element) {
    // Remover classe ativa de todos os botões
    document.querySelectorAll('.nav-btn').forEach(btn => btn.classList.remove('active'));
    
    // Adicionar classe ativa ao botão clicado
    element.classList.add('active');
    
    // Animar o indicador
    updateNavIndicator();
    
    console.log('Navegando para:', section);
}

function handleSidebarClick(section, element) {
    // Se o botão está desabilitado, não fazer nada
    if (element.disabled) {
        return;
    }
    
    if (section === 'logout') {
        window.location.href = '<?php echo APP_URL; ?>/logout';
        return;
    }
    
    // Remover classe ativa de todos os botões
    document.querySelectorAll('.sidebar-btn:not(:disabled)').forEach(btn => btn.classList.remove('active'));
    
    // Adicionar classe ativa ao botão clicado
    element.classList.add('active');
    
    // Animar o indicador
    updateSidebarIndicator();
    
    console.log('Acessando:', section);
}

function handleFooterClick(section) {
    console.log('Navegando (footer) para:', section);
}

// Inicializar com o primeiro botão ativo
document.addEventListener('DOMContentLoaded', function() {
    const firstNavBtn = document.querySelector('.nav-btn');
    const firstSidebarBtn = document.querySelector('.sidebar-btn:not(:disabled)');
    
    if (firstNavBtn) {
        firstNavBtn.classList.add('active');
        updateNavIndicator();
    }
    
    if (firstSidebarBtn) {
        firstSidebarBtn.classList.add('active');
        updateSidebarIndicator();
    }
    
    // Atualizar indicadores ao redimensionar
    window.addEventListener('resize', () => {
        updateNavIndicator();
        updateSidebarIndicator();
    });
});
</script>

<?php
$content = ob_get_clean();
include VIEWS_DIR . '/layouts/base.php';
?>
