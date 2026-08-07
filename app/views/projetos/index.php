<!-- Ícones Flutuantes de Fundo -->
<div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 0; overflow: hidden;">
    <img class="float-icon anim-float-2" style="right: 10%; top: 40%; width: 80px; opacity: 0.2;" src="<?= ASSETS ?>/images/tdesign-css3-filled.svg" alt=""/>
    <img class="float-icon anim-float-5" style="right: 5%; top: 20%; width: 100px; opacity: 0.1;" src="<?= ASSETS ?>/images/flowbite-html-solid.svg" alt=""/>
    <img class="float-icon anim-float-4" style="left: 30%; bottom: 20%; width: 90px; opacity: 0.1;" src="<?= ASSETS ?>/images/akar-icons-javascript-fill.png" alt=""/>
</div>

<div class="projects-page" style="position: relative; z-index: 1; padding: 20px 40px; display: flex; flex-direction: column; min-height: calc(100vh - 100px);">
    
    <!-- Barra de Pesquisa e Filtro -->
    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 40px; margin-top: 20px;">
        <div style="position: relative; width: 100%; max-width: 380px;">
            <input type="text" id="search-input" placeholder="Pesquisar por pastas/projetos..." 
                style="width: 100%; background: rgba(0, 0, 0, 0.4); border: none; border-radius: 30px; padding: 14px 24px; color: #fff; font-family: 'Urbanist', sans-serif; font-size: 15px; outline: none; backdrop-filter: blur(4px);">
            <div style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: #fff; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#094174" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
        </div>
        <div style="position: relative;">
            <button id="filter-btn" style="background: #094174; border: none; border-radius: 14px; width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 4px 12px rgba(0,0,0,0.3); transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" y1="21" x2="4" y2="14"></line>
                    <line x1="4" y1="10" x2="4" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12" y2="3"></line>
                    <line x1="20" y1="21" x2="20" y2="16"></line>
                    <line x1="20" y1="12" x2="20" y2="3"></line>
                    <line x1="2" y1="14" x2="6" y2="14"></line>
                    <line x1="10" y1="8" x2="14" y2="8"></line>
                    <line x1="18" y1="16" x2="22" y2="16"></line>
                </svg>
            </button>
            <!-- Dropdown de Filtro -->
            <div id="filter-dropdown" style="display: none; position: absolute; top: 55px; left: 0; background: rgba(9, 65, 116, 0.9); backdrop-filter: blur(10px); border-radius: 12px; padding: 8px; min-width: 140px; box-shadow: 0 8px 16px rgba(0,0,0,0.4); z-index: 100;">
                <div class="filter-option" data-filter="all" style="padding: 10px 16px; color: #fff; cursor: pointer; font-family: 'Urbanist', sans-serif; font-weight: 600; border-radius: 8px;">Tudo</div>
                <div class="filter-option" data-filter="pasta" style="padding: 10px 16px; color: #fff; cursor: pointer; font-family: 'Urbanist', sans-serif; font-weight: 600; border-radius: 8px;">Pastas</div>
                <div class="filter-option" data-filter="projeto" style="padding: 10px 16px; color: #fff; cursor: pointer; font-family: 'Urbanist', sans-serif; font-weight: 600; border-radius: 8px;">Projetos</div>
            </div>
        </div>
    </div>

    <!-- Grid de Itens -->
    <div id="projects-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 50px 40px; flex: 1;">
        
        <!-- Pasta 01 -->
        <div class="project-item" data-type="pasta" data-name="pasta 01" style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
            <div style="width: 100%; height: 200px; background: #518196; border-radius: 60px; box-shadow: 0 15px 30px rgba(0,0,0,0.25); cursor: pointer; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'"></div>
            <span style="font-family: 'Urbanist', sans-serif; font-weight: 700; font-size: 22px; color: #fff; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">Pasta 01</span>
        </div>

        <!-- Projeto 01 -->
        <div class="project-item" data-type="projeto" data-name="projeto 01" style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
            <div style="width: 100%; height: 200px; background: #ffffff; border-radius: 60px; display: flex; align-items: center; justify-content: center; box-shadow: 0 15px 30px rgba(0,0,0,0.25); cursor: pointer; transition: transform 0.3s; position: relative; overflow: hidden;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <span style="font-family: 'Urbanist', sans-serif; font-weight: 800; font-size: 28px; color: #000;">Olá mundo!</span>
                <img src="<?= ASSETS ?>/images/flowbite-html-solid.svg" style="position: absolute; right: 10px; bottom: 10px; width: 70px; opacity: 0.15; transform: rotate(-15deg);" alt="">
            </div>
            <span style="font-family: 'Urbanist', sans-serif; font-weight: 700; font-size: 22px; color: #fff; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">Projeto 01</span>
        </div>

        <!-- Pasta 02 -->
        <div class="project-item" data-type="pasta" data-name="pasta 02" style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
            <div style="width: 100%; height: 200px; background: #518196; border-radius: 60px; box-shadow: 0 15px 30px rgba(0,0,0,0.25); cursor: pointer; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'"></div>
            <span style="font-family: 'Urbanist', sans-serif; font-weight: 700; font-size: 22px; color: #fff; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">Pasta 02</span>
        </div>

        <!-- Criar Novo -->
        <div id="add-new-trigger" style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
            <div style="width: 100%; height: 200px; background: rgba(9, 65, 116, 0.5); border: 2px solid rgba(255,255,255,0.05); border-radius: 60px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s; box-shadow: 0 15px 30px rgba(0,0,0,0.25);" onmouseover="this.style.background='rgba(9, 65, 116, 0.7)'; this.style.transform='translateY(-5px)'" onmouseout="this.style.background='rgba(9, 65, 116, 0.5)'; this.style.transform='translateY(0)'">
                <svg width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#094174" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
            </div>
            <span style="font-family: 'Urbanist', sans-serif; font-weight: 700; font-size: 22px; color: #fff; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">Criar novo projeto/pasta</span>
        </div>
    </div>

    <!-- Footer Integrado -->
    <footer class="page-footer anim-footer" style="margin-top: 80px; padding-bottom: 20px;">
        <div class="footer-card">
            <div class="footer-grid">
                <div style="display:flex;flex-direction:column;align-items:center;">
                    <img style="width:92px;height:92px;object-fit:cover;" src="<?= ASSETS ?>/images/c244a778-6383-491d-b2f6-58d02d819c9e-1.png" alt="Architech"/>
                    <span class="font-pixelify" style="margin-top:4px;font-size:20px;font-weight:600;letter-spacing:2.2px;color:#fff;white-space:nowrap;text-shadow:0 4px 4px #00000040;">ARCHITECH</span>
                </div>
                <img style="width:9px;height:118px;align-self:center;" src="<?= ASSETS ?>/images/line-1.svg" alt=""/>
                <div style="display:flex;flex-direction:column;align-items:center;gap:12px;">
                    <div style="display:flex;align-items:center;border-radius:20px;padding:12px 24px;background:#ffffff1a;box-shadow:0 4px 4px #00000033;">
                        <a href="<?= BASE_URL ?>/"           class="nav-btn">Principal</a>
                        <a href="<?= BASE_URL ?>/exercicios" class="nav-btn">Exercícios</a>
                        <a href="<?= BASE_URL ?>/sobre"      class="nav-btn">Sobre</a>
                    </div>
                    <p class="font-urbanist" style="font-size:14px;font-weight:700;letter-spacing:1.54px;color:#fff;text-shadow:0 4px 4px #00000040;">© Architech. Todos os direitos reservados.</p>
                </div>
                <div style="display:flex;flex-direction:column;gap:8px;">
                    <div style="display:flex;align-items:center;gap:28px;">
                        <a href="#" class="social-link"><img style="width:47px;height:47px;" src="<?= ASSETS ?>/images/mdi-twitter.svg" alt="Twitter"/></a>
                        <a href="#" class="social-link"><img style="width:47px;height:50px;" src="<?= ASSETS ?>/images/formkit-instagram.svg" alt="Instagram"/></a>
                        <a href="#" class="social-link"><img style="width:45px;height:48px;" src="<?= ASSETS ?>/images/mdi-github.svg" alt="GitHub"/></a>
                    </div>
                    <p class="font-urbanist" style="font-size:14px;font-weight:700;letter-spacing:1.54px;color:#fff;text-shadow:0 4px 4px #00000040;">Suporte: architech.dev@gmail.com</p>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- MODAL OVERLAY -->
<div id="modal-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); backdrop-filter: blur(5px); z-index: 1000; align-items: center; justify-content: center;">
    
    <!-- STEP 1: ESCOLHER TIPO -->
    <div id="step-1" class="modal-card" style="display: flex; flex-direction: column; align-items: center; padding: 40px; background: #094174; border-radius: 60px; min-width: 450px; box-shadow: 0 20px 40px rgba(0,0,0,0.4); border: 1px solid rgba(255,255,255,0.1);">
        <h2 class="font-pixelify" style="color: #fff; font-size: 32px; margin-bottom: 24px; letter-spacing: 2px;">Criar novo(a)</h2>
        <div style="display: flex; gap: 40px; margin-bottom: 40px;">
            <label style="display: flex; align-items: center; gap: 10px; color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 700; font-size: 18px; cursor: pointer;">
                <input type="radio" name="type-choice" value="pasta" checked style="accent-color: #fff; width: 20px; height: 20px;"> Pasta
            </label>
            <label style="display: flex; align-items: center; gap: 10px; color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 700; font-size: 18px; cursor: pointer;">
                <input type="radio" name="type-choice" value="projeto" style="accent-color: #fff; width: 20px; height: 20px;"> Projeto
            </label>
        </div>
        <div style="display: flex; gap: 20px;">
            <button class="modal-cancel-btn" style="padding: 10px 30px; border-radius: 12px; border: none; background: #fff; color: #094174; font-family: 'Urbanist', sans-serif; font-weight: 800; cursor: pointer;">Cancelar</button>
            <button id="next-step-btn" style="padding: 10px 30px; border-radius: 12px; border: none; background: #518196; color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 800; cursor: pointer;">Próximo</button>
        </div>
    </div>

    <!-- STEP 2: CRIAR PASTA -->
    <div id="step-pasta" class="modal-card" style="display: none; flex-direction: column; align-items: center; padding: 40px; background: #094174; border-radius: 60px; min-width: 500px; box-shadow: 0 20px 40px rgba(0,0,0,0.4); border: 1px solid rgba(255,255,255,0.1);">
        <h2 class="font-pixelify" style="color: #fff; font-size: 32px; margin-bottom: 30px; letter-spacing: 2px;">Criar nova pasta</h2>
        <div style="width: 100%; margin-bottom: 40px;">
            <label class="font-urbanist" style="color: #fff; font-weight: 600; font-size: 18px; display: block; margin-bottom: 10px;">Nome da pasta: 
                <input type="text" placeholder="Digite o nome da sua pasta..." style="background: transparent; border: none; border-bottom: 1px solid rgba(255,255,255,0.5); width: 100%; color: #fff; padding: 8px 0; outline: none; font-size: 16px;">
            </label>
        </div>
        <div style="display: flex; gap: 20px;">
            <button class="modal-cancel-btn" style="padding: 10px 30px; border-radius: 12px; border: none; background: #fff; color: #094174; font-family: 'Urbanist', sans-serif; font-weight: 800; cursor: pointer;">Cancelar</button>
            <button class="modal-create-btn" style="padding: 10px 30px; border-radius: 12px; border: none; background: #518196; color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 800; cursor: pointer;">Criar</button>
        </div>
    </div>

    <!-- STEP 2: CRIAR PROJETO -->
    <div id="step-projeto" class="modal-card" style="display: none; flex-direction: column; align-items: center; padding: 40px; background: #094174; border-radius: 60px; min-width: 600px; box-shadow: 0 20px 40px rgba(0,0,0,0.4); border: 1px solid rgba(255,255,255,0.1);">
        <h2 class="font-pixelify" style="color: #fff; font-size: 32px; margin-bottom: 30px; letter-spacing: 2px;">Criar novo projeto</h2>
        <div style="width: 100%; margin-bottom: 25px;">
            <label class="font-urbanist" style="color: #fff; font-weight: 600; font-size: 18px; display: block; margin-bottom: 10px;">Nome do projeto: 
                <input type="text" placeholder="Digite o nome do seu projeto..." style="background: transparent; border: none; border-bottom: 1px solid rgba(255,255,255,0.5); width: 100%; color: #fff; padding: 8px 0; outline: none; font-size: 16px;">
            </label>
        </div>
        <div style="width: 100%; margin-bottom: 40px; text-align: center;">
            <span class="font-urbanist" style="color: #fff; font-weight: 700; font-size: 20px; display: block; margin-bottom: 20px;">Tipo de projeto:</span>
            <div style="display: flex; justify-content: center; gap: 30px;">
                <label style="display: flex; align-items: center; gap: 8px; color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 600; cursor: pointer;">
                    <input type="checkbox" checked style="accent-color: #fff; width: 18px; height: 18px;"> HTML
                </label>
                <label style="display: flex; align-items: center; gap: 8px; color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 600; cursor: pointer;">
                    <input type="checkbox" style="accent-color: #fff; width: 18px; height: 18px;"> JavaScript
                </label>
                <label style="display: flex; align-items: center; gap: 8px; color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 600; cursor: pointer;">
                    <input type="checkbox" checked style="accent-color: #fff; width: 18px; height: 18px;"> CSS
                </label>
            </div>
        </div>
        <div style="display: flex; gap: 20px;">
            <button class="modal-cancel-btn" style="padding: 10px 30px; border-radius: 12px; border: none; background: #fff; color: #094174; font-family: 'Urbanist', sans-serif; font-weight: 800; cursor: pointer;">Cancelar</button>
            <button class="modal-create-btn" style="padding: 10px 30px; border-radius: 12px; border: none; background: #518196; color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 800; cursor: pointer;">Criar</button>
        </div>
    </div>
</div>

<style>
    .filter-option:hover {
        background: rgba(255, 255, 255, 0.1);
    }
    .filter-option.active {
        background: #518196;
    }
    input::placeholder {
        color: rgba(255,255,255,0.4);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const filterBtn = document.getElementById('filter-btn');
    const filterDropdown = document.getElementById('filter-dropdown');
    const filterOptions = document.querySelectorAll('.filter-option');
    const projectItems = document.querySelectorAll('.project-item');
    
    // --- LÓGICA DE BUSCA E FILTRO ---
    let currentFilter = 'all';
    let currentSearch = '';

    function updateGrid() {
        projectItems.forEach(item => {
            const name = item.getAttribute('data-name').toLowerCase();
            const type = item.getAttribute('data-type');
            
            const matchesSearch = name.includes(currentSearch);
            const matchesFilter = currentFilter === 'all' || type === currentFilter;
            
            if (matchesSearch && matchesFilter) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    }

    searchInput.addEventListener('input', (e) => {
        currentSearch = e.target.value.toLowerCase();
        updateGrid();
    });

    filterBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        filterDropdown.style.display = filterDropdown.style.display === 'none' ? 'block' : 'none';
    });

    document.addEventListener('click', () => {
        filterDropdown.style.display = 'none';
    });

    filterOptions.forEach(opt => {
        opt.addEventListener('click', () => {
            filterOptions.forEach(o => o.classList.remove('active'));
            opt.classList.add('active');
            currentFilter = opt.getAttribute('data-filter');
            updateGrid();
        });
    });

    // --- LÓGICA DO MODAL ---
    const trigger = document.getElementById('add-new-trigger');
    const overlay = document.getElementById('modal-overlay');
    const step1 = document.getElementById('step-1');
    const stepPasta = document.getElementById('step-pasta');
    const stepProjeto = document.getElementById('step-projeto');
    const nextBtn = document.getElementById('next-step-btn');
    const cancelBtns = document.querySelectorAll('.modal-cancel-btn');
    const createBtns = document.querySelectorAll('.modal-create-btn');

    function resetModal() {
        overlay.style.display = 'none';
        step1.style.display = 'flex';
        stepPasta.style.display = 'none';
        stepProjeto.style.display = 'none';
    }

    trigger.addEventListener('click', () => {
        overlay.style.display = 'flex';
    });

    nextBtn.addEventListener('click', () => {
        const type = document.querySelector('input[name="type-choice"]:checked').value;
        step1.style.display = 'none';
        if (type === 'pasta') {
            stepPasta.style.display = 'flex';
        } else {
            stepProjeto.style.display = 'flex';
        }
    });

    cancelBtns.forEach(btn => {
        btn.addEventListener('click', resetModal);
    });

    createBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            alert('Funcionalidade de criação será integrada ao backend em breve!');
            resetModal();
        });
    });

    overlay.addEventListener('click', (e) => {
        if (e.target === overlay) resetModal();
    });
});
</script>
