<!-- Ícones Flutuantes de Fundo -->
<div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 0; overflow: hidden;">
    <img class="float-icon anim-float-2" style="right: 10%; top: 40%; width: 80px; opacity: 0.2;" src="<?= ASSETS ?>/images/tdesign-css3-filled.svg" alt=""/>
    <img class="float-icon anim-float-5" style="right: 5%; top: 20%; width: 100px; opacity: 0.1;" src="<?= ASSETS ?>/images/flowbite-html-solid.svg" alt=""/>
    <img class="float-icon anim-float-4" style="left: 30%; bottom: 20%; width: 90px; opacity: 0.1;" src="<?= ASSETS ?>/images/akar-icons-javascript-fill.png" alt=""/>
</div>

<div class="projects-page" style="position: relative; z-index: 1; padding: 20px 40px; display: flex; flex-direction: column; min-height: calc(100vh - 100px);">
    
    <!-- VIEW: GRID PRINCIPAL (PASTAS E PROJETOS NA RAIZ) -->
    <div id="view-grid" class="view-section">
        <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 40px; margin-top: 20px;">
            <div style="position: relative; width: 100%; max-width: 380px;">
                <input type="text" id="main-search" placeholder="Pesquisar por pastas/projetos..." 
                    style="width: 100%; background: rgba(0, 0, 0, 0.4); border: none; border-radius: 30px; padding: 14px 24px; color: #fff; font-family: 'Urbanist', sans-serif; font-size: 15px; outline: none; backdrop-filter: blur(4px);">
                <div style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: #fff; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#094174" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
            </div>
            <button class="filter-btn" style="background: #094174; border: none; border-radius: 14px; width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line>
                    <line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line>
                    <line x1="2" y1="14" x2="6" y2="14"></line><line x1="10" y1="8" x2="14" y2="8"></line><line x1="18" y1="16" x2="22" y2="16"></line>
                </svg>
            </button>
        </div>

        <div id="main-grid" class="projects-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 50px 40px;">
            <!-- Itens serão injetados via JS -->
        </div>
    </div>

    <!-- VIEW: INTERNA DA PASTA (DESIGN FIGMA 1) -->
    <div id="view-folder" class="view-section" style="display: none; flex-direction: column; background: rgba(255,255,255,0.05); border-radius: 40px; padding: 40px; border: 1px solid rgba(255,255,255,0.1); flex: 1; min-height: 360px; margin-bottom: 40px; backdrop-filter: blur(10px);">
        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 40px;">
            <button onclick="showGrid()" style="background: #094174; border: none; border-radius: 20px; padding: 10px 28px; color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 700; display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 18px;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                Voltar
            </button>
            <div style="background: rgba(255,255,255,0.1); border-radius: 20px; padding: 10px 28px; display: flex; align-items: center; gap: 12px;">
                <span id="folder-title" class="font-urbanist" style="color: #fff; font-weight: 700; font-size: 20px;">html</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="cursor:pointer;"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
            </div>
            <div style="position: relative; flex: 1; max-width: 300px;">
                <input type="text" id="folder-search" placeholder="Pesquisar por projetos..." style="width: 100%; background: rgba(0, 0, 0, 0.3); border: none; border-radius: 30px; padding: 12px 24px; color: #fff; outline: none; font-family: 'Urbanist', sans-serif;">
                <svg style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%);" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </div>
            <button id="folder-filter-button" type="button" style="background: #094174; border: none; border-radius: 12px; width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="2" y1="14" x2="6" y2="14"></line><line x1="10" y1="8" x2="14" y2="8"></line><line x1="18" y1="16" x2="22" y2="16"></line></svg>
            </button>
        </div>

        <div id="folder-grid" class="projects-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 50px 40px;">
            <!-- Itens da pasta serão injetados via JS -->
        </div>
    </div>

    <!-- VIEW: EDITOR DE CÓDIGO (DESIGN FIGMA 2) -->
    <div id="view-editor" class="view-section" style="display: none; flex: 1; flex-direction: column; min-height: 590px; margin-bottom: 40px; gap: 20px;">
        <div style="display: flex; align-items: center; gap: 20px;">
            <button onclick="backFromEditor()" style="background: transparent; border: none; color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 700; font-size: 22px; display: flex; align-items: center; gap: 10px; cursor: pointer;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                Voltar
            </button>
            <div style="margin: 0 auto; background: rgba(255,255,255,0.1); border-radius: 20px; padding: 10px 35px; display: flex; align-items: center; gap: 12px; backdrop-filter: blur(10px);">
                <span id="project-title" class="font-urbanist" style="color: #fff; font-weight: 700; font-size: 20px;">Novo Projeto</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="cursor:pointer;"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
            </div>
            <div style="width: 120px;"></div>
        </div>

        <div style="display: flex; flex: 1; min-height: 520px; background: transparent; border-radius: 50px; overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.6); border: 1px solid rgba(255,255,255,0.15);">
            <!-- Lado do Código -->
            <div style="flex: 1.2; display: flex; flex-direction: column; background: #1e1e1e; position: relative;">
                <div style="display: flex; flex: 1; overflow: hidden;">
                    <div id="line-numbers" aria-hidden="true" style="flex: 0 0 54px; align-self: stretch; overflow: hidden; white-space: pre; background: #1e1e1e; color: #6e6e6e; padding: 25px 12px; text-align: right; font-family: 'Courier New', monospace; font-size: 16px; line-height: 1.6; border-right: 1px solid #333; user-select: none; box-sizing: border-box;"><span class="line-numbers-content" style="display:block; will-change:transform;">1</span></div>
                    <textarea id="code-editor" spellcheck="false" wrap="off" style="flex: 1; min-height: 430px; background: #1e1e1e; color: #d4d4d4; border: none; padding: 25px 20px; font-family: 'Courier New', monospace; font-size: 16px; outline: none; resize: none; line-height: 1.6; tab-size: 4; white-space: pre; overflow: auto;"></textarea>
                </div>
                
                <div style="display: flex; justify-content: center; gap: 20px; padding: 20px; background: #1e1e1e;">
                    <button class="lang-tab active" onclick="switchLang('html')" style="background: #094174; color: #fff; border: none; border-radius: 25px; padding: 8px 30px; font-weight: 700; cursor: pointer; font-family: 'Urbanist', sans-serif; font-size: 16px;">HTML</button>
                    <button class="lang-tab" onclick="switchLang('css')" style="background: rgba(255,255,255,0.1); color: #fff; border: none; border-radius: 25px; padding: 8px 30px; font-weight: 700; cursor: pointer; font-family: 'Urbanist', sans-serif; font-size: 16px;">CSS</button>
                    <button class="lang-tab" onclick="switchLang('js')" style="background: rgba(255,255,255,0.1); color: #fff; border: none; border-radius: 25px; padding: 8px 30px; font-weight: 700; cursor: pointer; font-family: 'Urbanist', sans-serif; font-size: 16px;">JS</button>
                </div>
            </div>

            <!-- Lado do Preview -->
            <div style="flex: 1; background: #518196; position: relative; display: flex; flex-direction: column;">
                <iframe id="preview-frame" style="flex: 1; border: none; width: 100%; height: 100%; background: #518196;"></iframe>
                
                <div id="error-panel" style="display: none; position: absolute; top: 0; left: 0; right: 0; background: rgba(255,0,0,0.8); color: #fff; padding: 15px; font-family: 'Urbanist', sans-serif; z-index: 20;">
                    <strong>Erro:</strong> <span id="error-message"></span>
                </div>

                <div style="position: absolute; bottom: 30px; right: 30px; display: flex; gap: 15px; z-index: 10;">
                    <button onclick="saveProject()" style="background: #094174; border: none; border-radius: 12px; width: 52px; height: 52px; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 8px 20px rgba(0,0,0,0.4);">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                    </button>
                    <button onclick="runCode()" style="background: #094174; border: none; border-radius: 12px; width: 52px; height: 52px; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 8px 20px rgba(0,0,0,0.4);">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="#fff"><path d="M5 3l14 9-14 9V3z"></path></svg>
                    </button>
                </div>
            </div>
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
                        <a href="<?= BASE_URL ?>/" class="nav-btn">Principal</a>
                        <a href="<?= BASE_URL ?>/exercicios" class="nav-btn">Exercícios</a>
                        <a href="<?= BASE_URL ?>/sobre" class="nav-btn">Sobre</a>
                    </div>
                    <p class="font-urbanist" style="font-size:14px;font-weight:700;letter-spacing:1.54px;color:#fff;">© Architech. Todos os direitos reservados.</p>
                </div>
                <div style="display:flex;flex-direction:column;gap:8px;">
                    <div style="display:flex;align-items:center;gap:28px;">
                        <a href="#" class="social-link"><img style="width:47px;height:47px;" src="<?= ASSETS ?>/images/mdi-twitter.svg" alt="Twitter"/></a>
                        <a href="#" class="social-link"><img style="width:47px;height:50px;" src="<?= ASSETS ?>/images/formkit-instagram.svg" alt="Instagram"/></a>
                        <a href="#" class="social-link"><img style="width:45px;height:48px;" src="<?= ASSETS ?>/images/mdi-github.svg" alt="GitHub"/></a>
                    </div>
                    <p class="font-urbanist" style="font-size:14px;font-weight:700;letter-spacing:1.54px;color:#fff;">Suporte: architech.dev@gmail.com</p>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- MODAIS -->
<div id="modal-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); backdrop-filter: blur(8px); z-index: 1000; align-items: center; justify-content: center;">
    <!-- Step 1: Tipo -->
    <div id="step-1" class="modal-card" style="display: flex; flex-direction: column; align-items: center; padding: 40px; background: #094174; border-radius: 60px; min-width: 450px; border: 1px solid rgba(255,255,255,0.1);">
        <h2 class="font-pixelify" style="color: #fff; font-size: 32px; margin-bottom: 24px;">Criar novo(a)</h2>
        <div style="display: flex; gap: 40px; margin-bottom: 40px;">
            <label style="color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 700; font-size: 18px; cursor: pointer; display: flex; align-items: center; gap: 10px;">
                <input type="radio" name="type-choice" value="pasta" checked style="accent-color: #fff; width: 20px; height: 20px;"> Pasta
            </label>
            <label style="color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 700; font-size: 18px; cursor: pointer; display: flex; align-items: center; gap: 10px;">
                <input type="radio" name="type-choice" value="projeto" style="accent-color: #fff; width: 20px; height: 20px;"> Projeto
            </label>
        </div>
        <div style="display: flex; gap: 20px;">
            <button onclick="closeModal()" style="padding: 12px 35px; border-radius: 15px; border: none; background: #fff; color: #094174; font-weight: 800; cursor: pointer; font-family: 'Urbanist', sans-serif;">Cancelar</button>
            <button onclick="nextStep()" style="padding: 12px 35px; border-radius: 15px; border: none; background: #518196; color: #fff; font-weight: 800; cursor: pointer; font-family: 'Urbanist', sans-serif;">Próximo</button>
        </div>
    </div>
    <!-- Step Pasta -->
    <div id="step-pasta" class="modal-card" style="display: none; flex-direction: column; align-items: center; padding: 40px; background: #094174; border-radius: 60px; min-width: 500px;">
        <h2 class="font-pixelify" style="color: #fff; font-size: 32px; margin-bottom: 30px;">Criar nova pasta</h2>
        <div style="width: 100%; margin-bottom: 40px;">
            <label style="color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 600; font-size: 18px; display: block;">Nome da pasta: 
                <input type="text" id="new-folder-name" placeholder="Digite o nome da sua pasta..." style="background: transparent; border: none; border-bottom: 2px solid rgba(255,255,255,0.5); width: 100%; color: #fff; padding: 10px 0; outline: none; font-size: 16px;">
            </label>
        </div>
        <div style="display: flex; gap: 20px;">
            <button onclick="closeModal()" style="padding: 12px 35px; border-radius: 15px; border: none; background: #fff; color: #094174; font-weight: 800; cursor: pointer;">Cancelar</button>
            <button onclick="confirmCreateFolder()" style="padding: 12px 35px; border-radius: 15px; border: none; background: #518196; color: #fff; font-weight: 800; cursor: pointer;">Criar</button>
        </div>
    </div>
    <!-- Step Projeto -->
    <div id="step-projeto" class="modal-card" style="display: none; flex-direction: column; align-items: center; padding: 40px; background: #094174; border-radius: 60px; min-width: 600px;">
        <h2 class="font-pixelify" style="color: #fff; font-size: 32px; margin-bottom: 30px;">Criar novo projeto</h2>
        <div style="width: 100%; margin-bottom: 25px;">
            <label style="color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 600; font-size: 18px; display: block;">Nome do projeto: 
                <input type="text" id="new-project-name" placeholder="Digite o nome do seu projeto..." style="background: transparent; border: none; border-bottom: 2px solid rgba(255,255,255,0.5); width: 100%; color: #fff; padding: 10px 0; outline: none; font-size: 16px;">
            </label>
        </div>
        <div style="width: 100%; margin-bottom: 40px; text-align: center;">
            <span style="color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 700; font-size: 20px; display: block; margin-bottom: 20px;">Tipo de projeto:</span>
            <div style="display: flex; justify-content: center; gap: 30px;">
                <label style="color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 8px;"><input type="checkbox" checked style="accent-color: #fff; width: 18px; height: 18px;"> HTML</label>
                <label style="color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 8px;"><input type="checkbox" style="accent-color: #fff; width: 18px; height: 18px;"> JavaScript</label>
                <label style="color: #fff; font-family: 'Urbanist', sans-serif; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 8px;"><input type="checkbox" checked style="accent-color: #fff; width: 18px; height: 18px;"> CSS</label>
            </div>
        </div>
        <div style="display: flex; gap: 20px;">
            <button onclick="closeModal()" style="padding: 12px 35px; border-radius: 15px; border: none; background: #fff; color: #094174; font-weight: 800; cursor: pointer;">Cancelar</button>
            <button onclick="confirmCreateProject()" style="padding: 12px 35px; border-radius: 15px; border: none; background: #518196; color: #fff; font-weight: 800; cursor: pointer;">Criar</button>
        </div>
    </div>
</div>

<script>
    // --- PERSISTÊNCIA E DADOS ---
    let storage = JSON.parse(localStorage.getItem('architech_data')) || {
        folders: [
            { id: 1, name: 'Pasta 01', items: [] },
            { id: 2, name: 'Pasta 02', items: [] }
        ],
        projects: [
            { id: 101, name: 'Projeto 01', parentId: null, code: { html: '<h1>Olá mundo!</h1>', css: 'h1{color:#000}', js: '' } }
        ]
    };

    function saveData() {
        localStorage.setItem('architech_data', JSON.stringify(storage));
    }

    // --- ESTADO DA UI ---
    let currentFolderId = null;
    let currentProjectId = null;
    let currentLang = 'html';

    // --- RENDERIZAÇÃO ---
    function renderMainGrid() {
        const grid = document.getElementById('main-grid');
        grid.innerHTML = '';

        // Renderizar Pastas
        storage.folders.forEach(folder => {
            grid.innerHTML += `
                <div class="project-item" style="display: flex; flex-direction: column; align-items: center; gap: 15px; position: relative;">
                    <div onclick="openFolder(${folder.id})" style="width: 100%; height: 200px; background: #518196; border-radius: 60px; box-shadow: 0 15px 30px rgba(0,0,0,0.25); cursor: pointer; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'"></div>
                    <span style="font-family: 'Urbanist', sans-serif; font-weight: 700; font-size: 22px; color: #fff;">${folder.name}</span>
                    <button onclick="deleteItem('folder', ${folder.id})" style="position: absolute; top: 15px; right: 15px; background: rgba(220,38,38,0.8); border: none; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; cursor: pointer; opacity: 0; transition: opacity 0.3s;" class="delete-btn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                    </button>
                </div>
            `;
        });

        // Renderizar Projetos na Raiz
        storage.projects.filter(p => p.parentId === null).forEach(proj => {
            grid.innerHTML += `
                <div class="project-item" style="display: flex; flex-direction: column; align-items: center; gap: 15px; position: relative;">
                    <div onclick="openEditor(${proj.id})" style="width: 100%; height: 200px; background: #ffffff; border-radius: 60px; display: flex; align-items: center; justify-content: center; box-shadow: 0 15px 30px rgba(0,0,0,0.25); position: relative; overflow: hidden; cursor: pointer; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <span style="font-family: 'Urbanist', sans-serif; font-weight: 800; font-size: 28px; color: #000;">${proj.name}</span>
                        <img src="<?= ASSETS ?>/images/flowbite-html-solid.svg" style="position: absolute; right: 10px; bottom: 10px; width: 70px; opacity: 0.15; transform: rotate(-15deg);">
                    </div>
                    <span style="font-family: 'Urbanist', sans-serif; font-weight: 700; font-size: 22px; color: #fff;">${proj.name}</span>
                    <button onclick="deleteItem('project', ${proj.id})" style="position: absolute; top: 15px; right: 15px; background: rgba(220,38,38,0.8); border: none; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; cursor: pointer; opacity: 0; transition: opacity 0.3s;" class="delete-btn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                    </button>
                </div>
            `;
        });

        // Botão Criar Novo (Design Figma: Pasta + Projeto)
        grid.innerHTML += `
            <div onclick="openCreateModal()" style="display: flex; flex-direction: column; align-items: center; gap: 15px; cursor: pointer;">
                <div style="width: 100%; height: 200px; background: rgba(9, 65, 116, 0.5); border: 2px solid rgba(255,255,255,0.05); border-radius: 60px; display: flex; align-items: center; justify-content: center; transition: all 0.3s; box-shadow: 0 15px 30px rgba(0,0,0,0.25);" onmouseover="this.style.background='rgba(9, 65, 116, 0.7)'; this.style.transform='translateY(-5px)'" onmouseout="this.style.background='rgba(9, 65, 116, 0.5)'; this.style.transform='translateY(0)'">
                    <span aria-hidden="true" style="display:block;color:#062f5f;font-family:Arial,sans-serif;font-size:118px;font-weight:300;line-height:1;text-shadow:0 2px 0 rgba(255,255,255,.13);">+</span>
                </div>
                <span style="font-family: 'Urbanist', sans-serif; font-weight: 700; font-size: 22px; color: #fff;">Criar novo projeto/pasta</span>
            </div>
        `;
        
        addHoverEffects();
    }

    function renderFolderGrid(folderId) {
        const grid = document.getElementById('folder-grid');
        grid.innerHTML = '';

        const projects = storage.projects.filter(p => p.parentId === folderId);
        projects.forEach(proj => {
            grid.innerHTML += `
                <div class="project-item" style="display: flex; flex-direction: column; align-items: center; gap: 15px; position: relative;">
                    <div onclick="openEditor(${proj.id})" style="width: 100%; height: 200px; background: #ffffff; border-radius: 60px; display: flex; align-items: center; justify-content: center; box-shadow: 0 15px 30px rgba(0,0,0,0.25); position: relative; overflow: hidden; cursor: pointer; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <span style="font-family: 'Urbanist', sans-serif; font-weight: 800; font-size: 28px; color: #000;">${proj.name}</span>
                        <img src="<?= ASSETS ?>/images/flowbite-html-solid.svg" style="position: absolute; right: 10px; bottom: 10px; width: 70px; opacity: 0.15; transform: rotate(-15deg);">
                    </div>
                    <span style="font-family: 'Urbanist', sans-serif; font-weight: 700; font-size: 22px; color: #fff;">${proj.name}</span>
                    <button onclick="deleteItem('project', ${proj.id})" style="position: absolute; top: 15px; right: 15px; background: rgba(220,38,38,0.8); border: none; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; cursor: pointer; opacity: 0; transition: opacity 0.3s;" class="delete-btn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                    </button>
                </div>
            `;
        });

        // Botão Criar Novo Projeto (Design Figma 1: Apenas Projeto)
        grid.innerHTML += `
            <div onclick="openCreateModal('projeto')" style="display: flex; flex-direction: column; align-items: center; gap: 15px; cursor: pointer;">
                <div style="width: 100%; height: 200px; background: rgba(9, 65, 116, 0.5); border: 2px solid rgba(255,255,255,0.05); border-radius: 60px; display: flex; align-items: center; justify-content: center; transition: all 0.3s; box-shadow: 0 15px 30px rgba(0,0,0,0.25);" onmouseover="this.style.background='rgba(9, 65, 116, 0.7)'; this.style.transform='translateY(-5px)'" onmouseout="this.style.background='rgba(9, 65, 116, 0.5)'; this.style.transform='translateY(0)'">
                    <span aria-hidden="true" style="display:block;color:#062f5f;font-family:Arial,sans-serif;font-size:118px;font-weight:300;line-height:1;text-shadow:0 2px 0 rgba(255,255,255,.13);">+</span>
                </div>
                <span style="font-family: 'Urbanist', sans-serif; font-weight: 700; font-size: 22px; color: #fff;">Criar novo projeto</span>
            </div>
        `;
        
        addHoverEffects();
    }

    function addHoverEffects() {
        document.querySelectorAll('.project-item').forEach(item => {
            item.addEventListener('mouseenter', () => {
                const btn = item.querySelector('.delete-btn');
                if (btn) btn.style.opacity = '1';
            });
            item.addEventListener('mouseleave', () => {
                const btn = item.querySelector('.delete-btn');
                if (btn) btn.style.opacity = '0';
            });
        });
    }

    // --- NAVEGAÇÃO ---
    function showGrid() {
        currentFolderId = null;
        document.querySelectorAll('.view-section').forEach(v => v.style.display = 'none');
        document.getElementById('view-grid').style.display = 'block';
        renderMainGrid();
    }

    function openFolder(id) {
        currentFolderId = id;
        const folder = storage.folders.find(f => f.id === id);
        document.querySelectorAll('.view-section').forEach(v => v.style.display = 'none');
        document.getElementById('view-folder').style.display = 'flex';
        document.getElementById('folder-title').innerText = folder.name;
        renderFolderGrid(id);
    }

    function openEditor(id) {
        currentProjectId = id;
        const proj = storage.projects.find(p => p.id === id);
        document.querySelectorAll('.view-section').forEach(v => v.style.display = 'none');
        document.getElementById('view-editor').style.display = 'flex';
        document.getElementById('project-title').innerText = proj.name;
        
        // Resetar editor
        editor.value = proj.code[currentLang];
        updateLineNumbers();
        runCode();
    }

    function backFromEditor() {
        if (currentFolderId) {
            openFolder(currentFolderId);
        } else {
            showGrid();
        }
    }

    // --- CRUD ---
    function deleteItem(type, id) {
        if (!confirm('Tem certeza que deseja excluir?')) return;
        
        if (type === 'folder') {
            storage.folders = storage.folders.filter(f => f.id !== id);
            storage.projects = storage.projects.filter(p => p.parentId !== id);
        } else {
            storage.projects = storage.projects.filter(p => p.id !== id);
        }
        
        saveData();
        if (currentFolderId) renderFolderGrid(currentFolderId);
        else renderMainGrid();
    }

    function confirmCreateFolder() {
        const name = document.getElementById('new-folder-name').value || 'Nova Pasta';
        const newFolder = { id: Date.now(), name: name, items: [] };
        storage.folders.push(newFolder);
        saveData();
        closeModal();
        openFolder(newFolder.id);
    }

    function confirmCreateProject() {
        const name = document.getElementById('new-project-name').value || 'Novo Projeto';
        const newProj = { 
            id: Date.now(), 
            name: name, 
            parentId: currentFolderId,
            code: { 
                html: '<h1>Olá mundo!</h1>', 
                css: 'body{background:#518196; color:#fff; text-align:center;}', 
                js: 'console.log("Olá!")' 
            } 
        };
        storage.projects.push(newProj);
        saveData();
        closeModal();
        openEditor(newProj.id);
    }

    function saveProject() {
        const proj = storage.projects.find(p => p.id === currentProjectId);
        proj.code.html = document.getElementById('code-editor').value; // Simplificado para a aba atual
        // Para salvar todas as abas, precisaríamos de um objeto temporário, mas aqui salvamos o estado atual
        proj.code[currentLang] = document.getElementById('code-editor').value;
        saveData();
        alert('Projeto salvo com sucesso!');
    }

    // --- EDITOR ---
    const editor = document.getElementById('code-editor');
    const lineNumbers = document.getElementById('line-numbers');

    editor.addEventListener('input', () => {
        const proj = storage.projects.find(p => p.id === currentProjectId);
        proj.code[currentLang] = editor.value;
        updateLineNumbers();
        runCode();
    });

    function syncInlineLineNumbers() {
        const content = lineNumbers.querySelector('.line-numbers-content');
        if (content) content.style.transform = `translateY(-${editor.scrollTop}px)`;
    }

    function updateLineNumbers() {
        const lines = Math.max(1, editor.value.split('\n').length);
        lineNumbers.innerHTML = `<span class="line-numbers-content" style="display:block;white-space:pre;will-change:transform;">${Array.from({ length: lines }, (_, i) => i + 1).join('\n')}</span>`;
        syncInlineLineNumbers();
    }

    editor.addEventListener('scroll', syncInlineLineNumbers);

    function switchLang(lang) {
        currentLang = lang;
        document.querySelectorAll('.lang-tab').forEach(t => {
            t.classList.remove('active');
            t.style.background = 'rgba(255,255,255,0.1)';
        });
        event.target.classList.add('active');
        event.target.style.background = '#094174';
        
        const proj = storage.projects.find(p => p.id === currentProjectId);
        editor.value = proj.code[currentLang];
        updateLineNumbers();
    }

    function runCode() {
        const proj = storage.projects.find(p => p.id === currentProjectId);
        const frame = document.getElementById('preview-frame');
        const errorPanel = document.getElementById('error-panel');
        
        try {
            const content = `
                <html>
                    <head><style>${proj.code.css}</style></head>
                    <body>
                        ${proj.code.html}
                        <script>
                            try { ${proj.code.js} } 
                            catch(e) { window.parent.postMessage({type:'error', msg:e.message}, '*'); }
                        <\/script>
                    </body>
                </html>
            `;
            frame.srcdoc = content;
            errorPanel.style.display = 'none';
        } catch(e) {
            errorPanel.style.display = 'block';
            document.getElementById('error-message').innerText = e.message;
        }
    }

    window.addEventListener('message', (e) => {
        if (e.data.type === 'error') {
            const errorPanel = document.getElementById('error-panel');
            errorPanel.style.display = 'block';
            document.getElementById('error-message').innerText = e.data.msg;
        }
    });

    // --- MODAL ---
    const overlay = document.getElementById('modal-overlay');
    function openCreateModal(forcedType = null) {
        overlay.style.display = 'flex';
        document.getElementById('new-folder-name').value = '';
        document.getElementById('new-project-name').value = '';
        if (forcedType) {
            document.getElementById('step-1').style.display = 'none';
            document.getElementById('step-' + forcedType).style.display = 'flex';
        } else {
            document.getElementById('step-1').style.display = 'flex';
            document.getElementById('step-pasta').style.display = 'none';
            document.getElementById('step-projeto').style.display = 'none';
        }
    }

    function closeModal() { overlay.style.display = 'none'; }
    function nextStep() {
        const type = document.querySelector('input[name="type-choice"]:checked').value;
        document.getElementById('step-1').style.display = 'none';
        document.getElementById('step-' + type).style.display = 'flex';
    }

    // Inicialização
    renderMainGrid();
</script>
<script src="<?= ASSETS ?>/js/projects.js"></script>
