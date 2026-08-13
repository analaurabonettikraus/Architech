(() => {
    'use strict';

    const questionSets = {
        'CSS Frameworks': [
            { question: 'Qual framework é focado em componentes CSS responsivos?', options: ['Bootstrap', 'MySQL', 'Laravel', 'Node.js'], correct: 0, explanation: 'Bootstrap é um framework de front-end voltado para interfaces responsivas.' },
            { question: 'Qual classe cria um container responsivo no Bootstrap?', options: ['.container', '.database', '.request', '.endpoint'], correct: 0, explanation: 'A classe .container é usada para centralizar e organizar o conteúdo responsivo.' },
            { question: 'O Tailwind CSS trabalha principalmente com:', options: ['Classes utilitárias', 'Bancos de dados', 'Servidores de e-mail', 'Compiladores PHP'], correct: 0, explanation: 'Tailwind fornece classes utilitárias para construir a interface diretamente no HTML.' },
            { question: 'Qual é uma vantagem de usar framework CSS?', options: ['Acelerar a criação de layouts', 'Eliminar o HTML', 'Substituir imagens', 'Hospedar automaticamente'], correct: 0, explanation: 'Frameworks entregam componentes e padrões prontos para acelerar o desenvolvimento.' },
            { question: 'Um grid de framework facilita principalmente:', options: ['A organização responsiva de colunas', 'A criação de senhas', 'O envio de e-mails', 'A exclusão de CSS'], correct: 0, explanation: 'Sistemas de grid distribuem o conteúdo em colunas adaptáveis.' }
        ],
        'Responsividade': [
            { question: 'O que faz uma interface ser responsiva?', options: ['Adaptar-se a diferentes tamanhos de tela', 'Usar apenas fonte grande', 'Não possuir CSS', 'Funcionar só no celular'], correct: 0, explanation: 'Responsividade ajusta os elementos para diferentes dispositivos.' },
            { question: 'Qual recurso CSS cria pontos de quebra?', options: ['@media', '@font-face', '@keyframes', '@import'], correct: 0, explanation: 'Media queries aplicam estilos conforme características da tela.' },
            { question: 'Qual unidade é proporcional ao elemento pai?', options: ['%', 'px', 'cm', 'pt'], correct: 0, explanation: 'A porcentagem ajusta o tamanho de acordo com o espaço disponível.' },
            { question: 'Para que serve testar em telas menores?', options: ['Verificar leitura e navegação', 'Apagar o layout desktop', 'Desativar imagens', 'Remover o HTML'], correct: 0, explanation: 'O teste ajuda a garantir uma boa experiência em todos os dispositivos.' },
            { question: 'Qual propriedade ajuda a mudar a direção de um flex layout?', options: ['flex-direction', 'font-style', 'border-color', 'text-align'], correct: 0, explanation: 'flex-direction altera a organização dos itens dentro de um container flex.' }
        ],
        'Decore as tags': [
            { question: 'Qual tag representa o título principal?', options: ['<h1>', '<p>', '<img>', '<footer>'], correct: 0, explanation: 'A tag <h1> representa o título de maior nível.' },
            { question: 'Qual tag cria um link?', options: ['<a>', '<div>', '<span>', '<section>'], correct: 0, explanation: 'A tag <a> cria um hyperlink por meio do atributo href.' },
            { question: 'Qual tag é usada para imagens?', options: ['<img>', '<picture-text>', '<media>', '<file>'], correct: 0, explanation: 'A tag <img> insere imagens com atributos como src e alt.' },
            { question: 'Qual tag é apropriada para um parágrafo?', options: ['<p>', '<h1>', '<br>', '<nav>'], correct: 0, explanation: 'A tag <p> representa um parágrafo de texto.' },
            { question: 'Qual tag agrupa a navegação de uma página?', options: ['<nav>', '<aside>', '<main>', '<strong>'], correct: 0, explanation: 'A tag <nav> identifica uma região de links de navegação.' }
        ],
        'Transições': [
            { question: 'Qual propriedade deixa uma mudança CSS suave?', options: ['transition', 'position', 'display', 'outline'], correct: 0, explanation: 'transition controla uma mudança gradual entre estados.' },
            { question: 'Qual pseudo-classe reage ao cursor sobre um elemento?', options: [':hover', ':root', ':empty', ':target-only'], correct: 0, explanation: ':hover é ativada quando o cursor passa sobre o elemento.' },
            { question: 'Em transition: opacity 0.3s, o que significa 0.3s?', options: ['Duração', 'Largura', 'Quantidade de cores', 'Número de elementos'], correct: 0, explanation: 'O tempo em segundos define a duração da transição.' },
            { question: 'Qual propriedade pode aumentar um botão no hover?', options: ['transform: scale()', 'visibility: hidden', 'display: none', 'font-style: italic'], correct: 0, explanation: 'transform: scale() altera a escala visual do elemento.' },
            { question: 'Qual propriedade pode ser animada para aparecer gradualmente?', options: ['opacity', 'document', 'DOCTYPE', 'alt'], correct: 0, explanation: 'opacity varia a transparência e pode ser usada em transições.' }
        ],
        'Animações': [
            { question: 'Qual regra define as etapas de uma animação CSS?', options: ['@keyframes', '@media', '@supports', '@font-face'], correct: 0, explanation: '@keyframes descreve os estados da animação.' },
            { question: 'Qual propriedade associa um elemento a uma animação?', options: ['animation', 'transition', 'filter', 'outline'], correct: 0, explanation: 'A propriedade animation aplica uma sequência de keyframes ao elemento.' },
            { question: 'O que infinite faz em animation-iteration-count?', options: ['Repete continuamente', 'Executa uma vez', 'Pausa a animação', 'Aumenta a fonte'], correct: 0, explanation: 'infinite faz a animação se repetir sem parar.' },
            { question: 'Qual propriedade define o tempo de uma animação?', options: ['animation-duration', 'animation-color', 'animation-image', 'animation-route'], correct: 0, explanation: 'animation-duration define quanto tempo a animação leva.' },
            { question: 'Qual propriedade pode pausar uma animação?', options: ['animation-play-state', 'animation-font', 'animation-border', 'animation-width'], correct: 0, explanation: 'animation-play-state permite pausar ou executar uma animação.' }
        ]
    };

    const state = { questions: [], statuses: [], score: 0, seconds: 90, topic: 'CSS Frameworks', selected: null, locked: false, timer: null };
    const byId = (id) => document.getElementById(id);

    function getQuestions(topic) { return questionSets[topic] || questionSets['CSS Frameworks']; }
    function formatTime(seconds) { return `${Math.floor(seconds / 60)}:${String(seconds % 60).padStart(2, '0')}`; }
    function stopTimer() { if (state.timer) { window.clearInterval(state.timer); state.timer = null; } }

    function updateStatus() {
        byId('box-time').textContent = formatTime(state.seconds);
        byId('box-score').textContent = `✓${state.score}`;
        const opened = state.statuses.filter((status) => status !== 'unopened').length;
        byId('box-progress-bar').style.width = `${(opened / state.questions.length) * 100}%`;
    }

    function startTimer() {
        stopTimer();
        state.timer = window.setInterval(() => {
            state.seconds -= 1;
            updateStatus();
            if (state.seconds <= 0) showResult(true);
        }, 1000);
    }

    function renderBoxes() {
        const grid = byId('box-grid-game');
        grid.innerHTML = '';
        state.questions.forEach((question, index) => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'number-box';
            button.textContent = state.statuses[index] === 'unopened' ? String(index + 1) : state.statuses[index] === 'correct' ? '✓' : '×';
            if (state.statuses[index] !== 'unopened') {
                button.disabled = true;
                button.classList.add('is-open', state.statuses[index] === 'correct' ? 'is-correct' : 'is-wrong');
            } else {
                button.addEventListener('click', () => openChallenge(index));
            }
            grid.appendChild(button);
        });
        updateStatus();
    }

    function openChallenge(index) {
        if (state.locked || state.statuses[index] !== 'unopened') return;
        state.selected = index;
        const current = state.questions[index];
        byId('box-challenge-number').textContent = index + 1;
        byId('box-challenge-question').textContent = current.question;
        byId('box-challenge-feedback').textContent = '';
        const options = byId('box-challenge-options');
        options.innerHTML = '';
        current.options.forEach((option, optionIndex) => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'box-answer';
            button.textContent = `${String.fromCharCode(97 + optionIndex)}) ${option}`;
            button.addEventListener('click', () => answerChallenge(optionIndex));
            options.appendChild(button);
        });
        byId('box-challenge').style.display = 'flex';
    }

    function answerChallenge(answerIndex) {
        if (state.locked || state.selected === null) return;
        state.locked = true;
        const current = state.questions[state.selected];
        const correct = answerIndex === current.correct;
        const buttons = [...byId('box-challenge-options').querySelectorAll('.box-answer')];
        buttons.forEach((button, index) => {
            button.disabled = true;
            if (index === current.correct) button.classList.add('is-correct');
            if (index === answerIndex && !correct) button.classList.add('is-wrong');
        });
        state.statuses[state.selected] = correct ? 'correct' : 'wrong';
        if (correct) state.score += 1;
        byId('box-challenge-feedback').textContent = correct ? 'Resposta correta! A caixa foi aberta.' : current.explanation;
        updateStatus();
        window.setTimeout(() => {
            byId('box-challenge').style.display = 'none';
            state.selected = null;
            state.locked = false;
            renderBoxes();
            if (state.statuses.every((status) => status !== 'unopened')) showResult(false);
        }, correct ? 900 : 1700);
    }

    function showResult(timeout) {
        stopTimer();
        byId('box-challenge').style.display = 'none';
        byId('box-progress-bar').style.width = '100%';
        byId('box-result-topic').textContent = state.topic;
        const intro = timeout ? 'O tempo terminou.' : 'Você abriu todas as caixas!';
        byId('box-result-text').textContent = `${intro} Você acertou ${state.score} de ${state.questions.length} desafios.`;
        window.ArchitechProgress?.recordExercise('abra_a_caixa', state.score, state.questions.length);
        byId('box-result').style.display = 'flex';
    }

    window.openBoxes = function openBoxes() {
        state.topic = window.activeExerciseTopic || 'CSS Frameworks';
        byId('exercise-types').style.display = 'none';
        byId('box-screen').style.display = 'flex';
        byId('box-start-topic').textContent = state.topic;
        byId('box-result').style.display = 'none';
        byId('box-start').style.display = 'flex';
        byId('box-challenge').style.display = 'none';
        stopTimer();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    window.backToExerciseTypesFromBoxes = function backToExerciseTypesFromBoxes() {
        stopTimer();
        byId('box-screen').style.display = 'none';
        byId('box-challenge').style.display = 'none';
        byId('exercise-types').style.display = 'flex';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    window.startBoxes = function startBoxes() {
        state.topic = window.activeExerciseTopic || 'CSS Frameworks';
        state.questions = getQuestions(state.topic).map((question) => ({ ...question }));
        state.statuses = state.questions.map(() => 'unopened');
        state.score = 0;
        state.seconds = 90;
        state.selected = null;
        state.locked = false;
        byId('box-start').style.display = 'none';
        byId('box-result').style.display = 'none';
        byId('box-challenge').style.display = 'none';
        renderBoxes();
        startTimer();
    };
})();
