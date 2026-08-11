(() => {
    'use strict';

    const STORAGE_KEY = 'architech_data';
    const DEFAULT_CODE = {
        html: '<h1>Olá, mundo!</h1>\n<p>Bem-vindo ao Architech!</p>',
        css: 'body {\n  margin: 0;\n  min-height: 100vh;\n  display: grid;\n  place-items: center;\n  align-content: center;\n  gap: 14px;\n  background: #518196;\n  color: white;\n  font-family: Arial, sans-serif;\n}\n\nh1 {\n  margin: 0;\n  font-size: 42px;\n}',
        js: 'console.log("Projeto executado com sucesso!");'
    };

    const clone = (value) => JSON.parse(JSON.stringify(value));
    const escapeHTML = (value) => String(value ?? '').replace(/[&<>'"]/g, (char) => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#039;', '"': '&quot;'
    }[char]));

    function defaultData() {
        return {
            folders: [
                { id: 1, name: 'Pasta 01' },
                { id: 2, name: 'Pasta 02' }
            ],
            projects: [
                { id: 101, name: 'Projeto 01', parentId: null, code: clone(DEFAULT_CODE) }
            ]
        };
    }

    function loadData() {
        try {
            const raw = JSON.parse(localStorage.getItem(STORAGE_KEY));
            const data = raw && typeof raw === 'object' ? raw : defaultData();
            data.folders = Array.isArray(data.folders) ? data.folders : [];
            data.projects = Array.isArray(data.projects) ? data.projects : [];
            data.projects = data.projects.map((project) => ({
                ...project,
                parentId: project.parentId ?? null,
                code: { ...clone(DEFAULT_CODE), ...(project.code || {}) }
            }));
            return data;
        } catch (error) {
            return defaultData();
        }
    }

    let state = loadData();
    let currentFolderId = null;
    let currentProjectId = null;
    let currentLang = 'html';
    let mainSearchTerm = '';
    let mainFilter = 'all';
    let folderSearchTerm = '';
    let folderSort = 'recent';
    let activeMenu = null;

    const persist = () => localStorage.setItem(STORAGE_KEY, JSON.stringify(state));
    const getProject = (id) => state.projects.find((project) => Number(project.id) === Number(id));
    const getFolder = (id) => state.folders.find((folder) => Number(folder.id) === Number(id));
    const folderGrid = () => document.getElementById('folder-grid');
    const mainGrid = () => document.getElementById('main-grid');
    const editor = () => document.getElementById('code-editor');

    function iconTrash() {
        return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>';
    }

    function iconPlus() {
        return '<svg width="112" height="112" viewBox="0 0 24 24" fill="none" stroke="#063c70" stroke-width="3.25" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="4.5" x2="12" y2="19.5"></line><line x1="4.5" y1="12" x2="19.5" y2="12"></line></svg>';
    }

    function deleteButton(type, id) {
        return `<button type="button" onclick="deleteItem('${type}', ${Number(id)})" class="delete-btn" aria-label="Excluir" title="Excluir" style="position:absolute;top:14px;right:14px;width:36px;height:36px;border:0;border-radius:50%;background:rgba(201,52,52,.92);display:flex;align-items:center;justify-content:center;cursor:pointer;opacity:0;transition:opacity .2s,transform .2s;box-shadow:0 4px 10px rgba(0,0,0,.24);z-index:3;">${iconTrash()}</button>`;
    }

    function folderCard(folder) {
        return `<article class="project-item" data-name="${escapeHTML(folder.name).toLowerCase()}" data-kind="folder" style="position:relative;display:flex;flex-direction:column;align-items:center;gap:15px;">
            <button type="button" onclick="openFolder(${Number(folder.id)})" aria-label="Abrir pasta ${escapeHTML(folder.name)}" style="width:100%;height:200px;border:0;background:#518196;border-radius:60px;box-shadow:0 15px 30px rgba(0,0,0,.25);cursor:pointer;transition:transform .25s;" onmouseenter="this.style.transform='translateY(-5px)'" onmouseleave="this.style.transform='translateY(0)'"></button>
            <span style="font-family:'Urbanist',sans-serif;font-weight:700;font-size:22px;color:#fff;text-shadow:0 2px 4px rgba(0,0,0,.25);">${escapeHTML(folder.name)}</span>
            ${deleteButton('folder', folder.id)}
        </article>`;
    }

    function projectCard(project) {
        return `<article class="project-item" data-name="${escapeHTML(project.name).toLowerCase()}" data-kind="project" style="position:relative;display:flex;flex-direction:column;align-items:center;gap:15px;">
            <button type="button" onclick="openEditor(${Number(project.id)})" aria-label="Abrir projeto ${escapeHTML(project.name)}" style="width:100%;height:200px;border:0;background:#fff;border-radius:60px;display:flex;align-items:center;justify-content:center;box-shadow:0 15px 30px rgba(0,0,0,.25);position:relative;overflow:hidden;cursor:pointer;transition:transform .25s;" onmouseenter="this.style.transform='translateY(-5px)'" onmouseleave="this.style.transform='translateY(0)'"><strong style="font-family:'Urbanist',sans-serif;font-size:27px;color:#111;z-index:1;">${escapeHTML(project.name)}</strong><img src="${window.ASSETS || '/assets'}/images/flowbite-html-solid.svg" alt="" style="position:absolute;right:10px;bottom:10px;width:70px;opacity:.12;transform:rotate(-15deg);"></button>
            <span style="font-family:'Urbanist',sans-serif;font-weight:700;font-size:22px;color:#fff;text-shadow:0 2px 4px rgba(0,0,0,.25);">${escapeHTML(project.name)}</span>
            ${deleteButton('project', project.id)}
        </article>`;
    }

    function createCard(insideFolder = false) {
        const label = insideFolder ? 'Criar novo projeto' : 'Criar novo projeto/pasta';
        const forced = insideFolder ? "'projeto'" : '';
        return `<article class="create-card" style="display:flex;flex-direction:column;align-items:center;gap:15px;${insideFolder ? 'margin-top:12px;' : ''}">
            <button type="button" onclick="openCreateModal(${forced})" aria-label="${label}" title="${label}" style="width:100%;height:220px;border:2px solid rgba(255,255,255,.08);background:linear-gradient(145deg,rgba(31,103,151,.92),rgba(9,65,116,.82));border-radius:60px;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 15px 30px rgba(0,0,0,.25),inset 0 1px 0 rgba(255,255,255,.1);transition:background .25s,transform .25s;" onmouseenter="this.style.background='linear-gradient(145deg,rgba(39,119,172,.98),rgba(9,65,116,.95))';this.style.transform='translateY(-5px)'" onmouseleave="this.style.background='linear-gradient(145deg,rgba(31,103,151,.92),rgba(9,65,116,.82))';this.style.transform='translateY(0)'>${iconPlus()}</button>
            <span style="font-family:'Urbanist',sans-serif;font-weight:700;font-size:22px;color:#fff;text-shadow:0 2px 4px rgba(0,0,0,.25);">${label}</span>
        </article>`;
    }

    function bindDeleteHover(root) {
        root.querySelectorAll('.project-item').forEach((item) => {
            item.addEventListener('mouseenter', () => {
                const button = item.querySelector('.delete-btn');
                if (button) button.style.opacity = '1';
            });
            item.addEventListener('mouseleave', () => {
                const button = item.querySelector('.delete-btn');
                if (button) button.style.opacity = '0';
            });
        });
    }

    window.renderMainGrid = function renderMainGrid() {
        const grid = mainGrid();
        if (!grid) return;
        const search = mainSearchTerm.trim().toLocaleLowerCase('pt-BR');
        const matches = (item) => !search || item.name.toLocaleLowerCase('pt-BR').includes(search);
        const folders = state.folders.filter(matches);
        const projects = state.projects.filter((project) => project.parentId === null && matches(project));
        let content = '';

        if (mainFilter === 'all' || mainFilter === 'folders') content += folders.map(folderCard).join('');
        if (mainFilter === 'all' || mainFilter === 'projects') content += projects.map(projectCard).join('');
        content += createCard(false);
        grid.innerHTML = content;
        bindDeleteHover(grid);
    };

    window.renderFolderGrid = function renderFolderGrid(folderId = currentFolderId) {
        const grid = folderGrid();
        if (!grid || folderId === null) return;
        const search = folderSearchTerm.trim().toLocaleLowerCase('pt-BR');
        let projects = state.projects.filter((project) => Number(project.parentId) === Number(folderId));
        projects = projects.filter((project) => !search || project.name.toLocaleLowerCase('pt-BR').includes(search));

        if (folderSort === 'az') projects.sort((a, b) => a.name.localeCompare(b.name, 'pt-BR'));
        if (folderSort === 'za') projects.sort((a, b) => b.name.localeCompare(a.name, 'pt-BR'));
        if (folderSort === 'recent') projects.sort((a, b) => Number(b.id) - Number(a.id));

        grid.innerHTML = projects.map(projectCard).join('') + createCard(true);
        bindDeleteHover(grid);
    };

    window.showGrid = function showGrid() {
        currentFolderId = null;
        currentProjectId = null;
        document.querySelectorAll('.view-section').forEach((view) => { view.style.display = 'none'; });
        document.getElementById('view-grid').style.display = 'block';
        window.renderMainGrid();
    };

    window.openFolder = function openFolder(id) {
        const folder = getFolder(id);
        if (!folder) return;
        currentFolderId = Number(id);
        currentProjectId = null;
        folderSearchTerm = '';
        const search = document.getElementById('folder-search');
        if (search) search.value = '';
        document.querySelectorAll('.view-section').forEach((view) => { view.style.display = 'none'; });
        const folderView = document.getElementById('view-folder');
        folderView.style.display = 'flex';
        document.getElementById('folder-title').textContent = folder.name;
        window.renderFolderGrid(currentFolderId);
    };

    window.openEditor = function openEditor(id) {
        const project = getProject(id);
        if (!project) return;
        currentProjectId = Number(id);
        currentLang = 'html';
        document.querySelectorAll('.view-section').forEach((view) => { view.style.display = 'none'; });
        document.getElementById('view-editor').style.display = 'flex';
        document.getElementById('project-title').textContent = project.name;
        updateLanguageButtons();
        editor().value = project.code.html || '';
        updateLineNumbers();
        window.runCode();
    };

    window.backFromEditor = function backFromEditor() {
        if (currentFolderId !== null) window.openFolder(currentFolderId);
        else window.showGrid();
    };

    window.deleteItem = function deleteItem(type, id) {
        if (!window.confirm(`Deseja excluir ${type === 'folder' ? 'esta pasta e os projetos dentro dela' : 'este projeto'}?`)) return;
        if (type === 'folder') {
            state.folders = state.folders.filter((folder) => Number(folder.id) !== Number(id));
            state.projects = state.projects.filter((project) => Number(project.parentId) !== Number(id));
        } else {
            state.projects = state.projects.filter((project) => Number(project.id) !== Number(id));
        }
        persist();
        if (currentFolderId !== null) window.renderFolderGrid(currentFolderId);
        else window.renderMainGrid();
    };

    function displayModalStep(step) {
        ['step-1', 'step-pasta', 'step-projeto'].forEach((id) => {
            const element = document.getElementById(id);
            element.style.display = id === step ? 'flex' : 'none';
        });
    }

    window.openCreateModal = function openCreateModal(forcedType = null) {
        document.getElementById('modal-overlay').style.display = 'flex';
        document.getElementById('new-folder-name').value = '';
        document.getElementById('new-project-name').value = '';
        displayModalStep(forcedType === 'projeto' ? 'step-projeto' : 'step-1');
    };

    window.closeModal = function closeModal() {
        document.getElementById('modal-overlay').style.display = 'none';
    };

    window.nextStep = function nextStep() {
        const type = document.querySelector('input[name="type-choice"]:checked').value;
        displayModalStep(type === 'pasta' ? 'step-pasta' : 'step-projeto');
    };

    window.confirmCreateFolder = function confirmCreateFolder() {
        const field = document.getElementById('new-folder-name');
        const name = field.value.trim() || 'Nova Pasta';
        const folder = { id: Date.now(), name };
        state.folders.push(folder);
        persist();
        window.closeModal();
        window.openFolder(folder.id);
    };

    window.confirmCreateProject = function confirmCreateProject() {
        const field = document.getElementById('new-project-name');
        const name = field.value.trim() || 'Novo Projeto';
        const project = { id: Date.now(), name, parentId: currentFolderId, code: clone(DEFAULT_CODE) };
        state.projects.push(project);
        persist();
        window.closeModal();
        window.openEditor(project.id);
    };

    function updateLanguageButtons() {
        document.querySelectorAll('.lang-tab').forEach((tab) => {
            const isActive = tab.textContent.trim().toLowerCase() === currentLang;
            tab.classList.toggle('active', isActive);
            tab.style.background = isActive ? '#094174' : 'rgba(255,255,255,.1)';
        });
    }

    window.switchLang = function switchLang(lang) {
        const project = getProject(currentProjectId);
        if (!project) return;
        project.code[currentLang] = editor().value;
        currentLang = lang;
        editor().value = project.code[currentLang] || '';
        updateLanguageButtons();
        updateLineNumbers();
    };

    function updateLineNumbers() {
        const numberColumn = document.getElementById('line-numbers');
        const numberOfLines = editor().value.split('\n').length;
        numberColumn.textContent = Array.from({ length: numberOfLines }, (_, index) => index + 1).join('\n');
    }

    window.runCode = function runCode() {
        const project = getProject(currentProjectId);
        if (!project) return;
        project.code[currentLang] = editor().value;
        const frame = document.getElementById('preview-frame');
        const errorPanel = document.getElementById('error-panel');
        const errorMessage = document.getElementById('error-message');
        errorPanel.style.display = 'none';
        const html = project.code.html || '';
        const css = project.code.css || '';
        const javascript = project.code.js || '';
        frame.srcdoc = `<!doctype html><html lang="pt-BR"><head><meta charset="utf-8"><style>${css}</style></head><body>${html}<script>window.onerror=function(message,source,line){parent.postMessage({type:'architech-project-error',message:message,line:line},'*')};try{${javascript}}catch(error){parent.postMessage({type:'architech-project-error',message:error.message},'*')}<\/script></body></html>`;
        errorMessage.textContent = '';
    };

    window.saveProject = function saveProject() {
        const project = getProject(currentProjectId);
        if (!project) return;
        project.code[currentLang] = editor().value;
        persist();
        const button = document.querySelector('[onclick="saveProject()"]');
        if (button) {
            const previous = button.style.background;
            button.style.background = '#2d9b68';
            setTimeout(() => { button.style.background = previous; }, 900);
        }
    };

    function setupSearchAndFilters() {
        const mainSearch = document.getElementById('main-search');
        const folderSearch = document.getElementById('folder-search');
        mainSearch.addEventListener('input', () => {
            mainSearchTerm = mainSearch.value;
            window.renderMainGrid();
        });
        folderSearch.addEventListener('input', () => {
            folderSearchTerm = folderSearch.value;
            window.renderFolderGrid();
        });

        const mainFilterButton = document.querySelector('.filter-btn');
        const folderFilterButton = document.getElementById('folder-filter-button');
        mainFilterButton.addEventListener('click', (event) => {
            event.stopPropagation();
            showFilterMenu(mainFilterButton, [
                ['all', 'Tudo'], ['folders', 'Pastas'], ['projects', 'Projetos']
            ], mainFilter, (value) => {
                mainFilter = value;
                window.renderMainGrid();
            });
        });
        folderFilterButton.addEventListener('click', (event) => {
            event.stopPropagation();
            showFilterMenu(folderFilterButton, [
                ['recent', 'Mais recentes'], ['az', 'Nome: A–Z'], ['za', 'Nome: Z–A']
            ], folderSort, (value) => {
                folderSort = value;
                window.renderFolderGrid();
            });
        });

        document.addEventListener('click', closeFilterMenu);
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') closeFilterMenu();
        });
    }

    function closeFilterMenu() {
        if (activeMenu) {
            activeMenu.remove();
            activeMenu = null;
        }
    }

    function showFilterMenu(button, options, selected, onChoose) {
        closeFilterMenu();
        const rect = button.getBoundingClientRect();
        const menu = document.createElement('div');
        menu.className = 'projects-filter-menu';
        menu.style.cssText = `position:fixed;top:${rect.bottom + 9}px;left:${rect.left}px;min-width:180px;padding:8px;background:rgba(9,65,116,.96);border:1px solid rgba(255,255,255,.16);border-radius:14px;box-shadow:0 12px 30px rgba(0,0,0,.32);z-index:1200;backdrop-filter:blur(12px);`;
        options.forEach(([value, label]) => {
            const option = document.createElement('button');
            option.type = 'button';
            option.textContent = label;
            option.style.cssText = `display:block;width:100%;padding:10px 12px;border:0;border-radius:9px;text-align:left;font-family:'Urbanist',sans-serif;font-size:14px;font-weight:700;color:#fff;background:${value === selected ? 'rgba(255,255,255,.20)' : 'transparent'};cursor:pointer;`;
            option.addEventListener('mouseenter', () => { option.style.background = 'rgba(255,255,255,.18)'; });
            option.addEventListener('mouseleave', () => { option.style.background = value === selected ? 'rgba(255,255,255,.20)' : 'transparent'; });
            option.addEventListener('click', (event) => {
                event.stopPropagation();
                onChoose(value);
                closeFilterMenu();
            });
            menu.appendChild(option);
        });
        document.body.appendChild(menu);
        activeMenu = menu;
    }

    function setupEditor() {
        editor().addEventListener('input', () => {
            const project = getProject(currentProjectId);
            if (!project) return;
            project.code[currentLang] = editor().value;
            updateLineNumbers();
        });
        editor().addEventListener('scroll', () => {
            document.getElementById('line-numbers').scrollTop = editor().scrollTop;
        });
        window.addEventListener('message', (event) => {
            if (event.data?.type !== 'architech-project-error') return;
            document.getElementById('error-panel').style.display = 'block';
            const detail = event.data.line ? ` (linha ${event.data.line})` : '';
            document.getElementById('error-message').textContent = `${event.data.message}${detail}`;
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        setupSearchAndFilters();
        setupEditor();
        window.renderMainGrid();
    });
})();
