(() => {
    'use strict';

    const phraseSets = {
        'CSS Frameworks': [
            { prefix: 'No desenvolvimento mobile, um framework bastante famoso é o', suffix: 'criado pelo Google.', options: ['Flutter', 'Laravel'], correct: 0, explanation: 'Flutter é o framework criado pelo Google para interfaces multiplataforma.' },
            { prefix: 'O Bootstrap facilita a criação de interfaces', suffix: 'para diferentes telas.', options: ['responsivas', 'invisíveis'], correct: 0, explanation: 'Bootstrap fornece componentes voltados a interfaces responsivas.' },
            { prefix: 'O Tailwind CSS usa classes', suffix: 'para estilizar elementos rapidamente.', options: ['utilitárias', 'de banco de dados'], correct: 0, explanation: 'Tailwind trabalha com classes utilitárias aplicadas no HTML.' },
            { prefix: 'Um sistema de grid ajuda a organizar o conteúdo em', suffix: '.', options: ['colunas', 'senhas'], correct: 0, explanation: 'O grid organiza a interface em linhas e colunas.' },
            { prefix: 'Componentes prontos ajudam a desenvolver páginas com mais', suffix: '.', options: ['agilidade', 'arquivos duplicados'], correct: 0, explanation: 'Frameworks reduzem o trabalho repetitivo e aceleram a criação da interface.' }
        ],
        'Responsividade': [
            { prefix: 'Uma interface responsiva se adapta a diferentes tamanhos de', suffix: '.', options: ['tela', 'banco de dados'], correct: 0, explanation: 'Responsividade adapta o layout a celulares, tablets e computadores.' },
            { prefix: 'No CSS, usamos', suffix: 'para aplicar estilos conforme a largura da tela.', options: ['@media', '@font-face'], correct: 0, explanation: 'Media queries permitem regras para tamanhos de tela diferentes.' },
            { prefix: 'A unidade', suffix: 'é proporcional ao tamanho do elemento pai.', options: ['%', 'px fixo'], correct: 0, explanation: 'A porcentagem é calculada em relação ao espaço disponível.' },
            { prefix: 'Layouts com flexbox podem mudar sua direção usando', suffix: '.', options: ['flex-direction', 'text-decoration'], correct: 0, explanation: 'flex-direction define se os itens flex ficam em linha ou coluna.' },
            { prefix: 'Testar a página em um celular ajuda a melhorar a', suffix: 'do usuário.', options: ['experiência', 'quantidade de arquivos'], correct: 0, explanation: 'O teste em diferentes dispositivos ajuda a garantir uma boa experiência.' }
        ],
        'Decore as tags': [
            { prefix: 'A tag', suffix: 'é usada para criar um link.', options: ['<a>', '<div>'], correct: 0, explanation: 'A tag <a> cria links, normalmente com o atributo href.' },
            { prefix: 'A tag', suffix: 'representa o título principal de uma página.', options: ['<h1>', '<p>'], correct: 0, explanation: '<h1> é o cabeçalho de maior nível.' },
            { prefix: 'Para inserir uma imagem, usamos a tag', suffix: '.', options: ['<img>', '<picture-text>'], correct: 0, explanation: 'A tag <img> exibe uma imagem e deve ter um texto alternativo em alt.' },
            { prefix: 'Um parágrafo é marcado no HTML com a tag', suffix: '.', options: ['<p>', '<nav>'], correct: 0, explanation: 'A tag <p> representa um parágrafo.' },
            { prefix: 'A região de navegação da página pode ser marcada com', suffix: '.', options: ['<nav>', '<strong>'], correct: 0, explanation: 'A tag <nav> identifica blocos de links de navegação.' }
        ],
        'Transições': [
            { prefix: 'A propriedade CSS usada para mudanças suaves é', suffix: '.', options: ['transition', 'position'], correct: 0, explanation: 'transition controla alterações graduais entre estados CSS.' },
            { prefix: 'Quando o mouse passa sobre um elemento, podemos usar a pseudo-classe', suffix: '.', options: [':hover', ':root'], correct: 0, explanation: ':hover é ativada quando o cursor está sobre o elemento.' },
            { prefix: 'Em transition: opacity 0.3s, o valor 0.3s indica a', suffix: '.', options: ['duração', 'largura'], correct: 0, explanation: 'O valor em segundos representa o tempo da transição.' },
            { prefix: 'Para aumentar um elemento suavemente, podemos usar transform:', suffix: '().', options: ['scale', 'delete'], correct: 0, explanation: 'transform: scale() altera a escala de um elemento.' },
            { prefix: 'A propriedade opacity controla a', suffix: 'de um elemento.', options: ['transparência', 'altura'], correct: 0, explanation: 'opacity define o quanto um elemento é transparente.' }
        ],
        'Animações': [
            { prefix: 'A regra CSS que define etapas de animação é', suffix: '.', options: ['@keyframes', '@media'], correct: 0, explanation: '@keyframes descreve os estados de uma animação.' },
            { prefix: 'A propriedade que aplica uma sequência de keyframes é', suffix: '.', options: ['animation', 'filter'], correct: 0, explanation: 'animation associa uma animação a um elemento.' },
            { prefix: 'Para repetir uma animação continuamente, usamos o valor', suffix: '.', options: ['infinite', 'hidden'], correct: 0, explanation: 'infinite faz a animação se repetir sem parar.' },
            { prefix: 'A duração de uma animação é definida por', suffix: '.', options: ['animation-duration', 'animation-color'], correct: 0, explanation: 'animation-duration determina o tempo de execução.' },
            { prefix: 'Uma animação pode ser pausada com', suffix: '.', options: ['animation-play-state', 'animation-font'], correct: 0, explanation: 'animation-play-state permite pausar ou retomar a animação.' }
        ]
    };

    const state = { phrases: [], index: 0, score: 0, seconds: 90, timer: null, locked: false, topic: 'CSS Frameworks' };
    const byId = (id) => document.getElementById(id);

    function getPhrases(topic) { return phraseSets[topic] || phraseSets['CSS Frameworks']; }
    function formatTime(seconds) { return `${Math.floor(seconds / 60)}:${String(seconds % 60).padStart(2, '0')}`; }
    function stopTimer() { if (state.timer) { window.clearInterval(state.timer); state.timer = null; } }

    function updateStatus() {
        byId('phrase-time').textContent = formatTime(state.seconds);
        byId('phrase-score').textContent = `✓${state.score}`;
        const progress = state.phrases.length ? (state.index / state.phrases.length) * 100 : 0;
        byId('phrase-progress-bar').style.width = `${progress}%`;
    }

    function startTimer() {
        stopTimer();
        state.timer = window.setInterval(() => {
            state.seconds -= 1;
            updateStatus();
            if (state.seconds <= 0) showResult(true);
        }, 1000);
    }

    function renderPhrase() {
        const current = state.phrases[state.index];
        if (!current) { showResult(false); return; }
        state.locked = false;
        const sentence = byId('phrase-sentence');
        sentence.innerHTML = '';
        sentence.append(document.createTextNode(`${current.prefix} `));
        const blank = document.createElement('span');
        blank.className = 'phrase-blank';
        blank.textContent = '_____';
        sentence.append(blank, document.createTextNode(` ${current.suffix}`));

        const options = byId('phrase-options');
        options.innerHTML = '';
        current.options.forEach((option, optionIndex) => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'phrase-option';
            button.textContent = option;
            button.addEventListener('click', () => answerPhrase(optionIndex));
            options.appendChild(button);
        });
        byId('phrase-feedback').textContent = '';
        updateStatus();
    }

    function answerPhrase(answerIndex) {
        if (state.locked) return;
        state.locked = true;
        const current = state.phrases[state.index];
        const correct = answerIndex === current.correct;
        const buttons = [...byId('phrase-options').querySelectorAll('.phrase-option')];
        buttons.forEach((button, index) => {
            button.disabled = true;
            if (index === current.correct) button.classList.add('is-correct');
            if (index === answerIndex && !correct) button.classList.add('is-wrong');
        });
        const blank = byId('phrase-sentence').querySelector('.phrase-blank');
        blank.textContent = current.options[current.correct];
        if (correct) state.score += 1;
        byId('phrase-feedback').textContent = correct ? 'Resposta correta! Muito bem.' : current.explanation;
        updateStatus();
        window.setTimeout(() => {
            state.index += 1;
            renderPhrase();
        }, correct ? 950 : 1750);
    }

    function showResult(timeout) {
        stopTimer();
        byId('phrase-progress-bar').style.width = '100%';
        byId('phrase-result-topic').textContent = state.topic;
        const intro = timeout ? 'O tempo terminou.' : 'Você completou todas as frases!';
        byId('phrase-result-text').textContent = `${intro} Você acertou ${state.score} de ${state.phrases.length} desafios.`;
        window.ArchitechProgress?.recordExercise('complete_a_frase', state.score, state.phrases.length);
        byId('phrase-result').style.display = 'flex';
    }

    window.openPhrases = function openPhrases() {
        state.topic = window.activeExerciseTopic || 'CSS Frameworks';
        byId('exercise-types').style.display = 'none';
        byId('phrase-screen').style.display = 'flex';
        byId('phrase-start-topic').textContent = state.topic;
        byId('phrase-result').style.display = 'none';
        byId('phrase-start').style.display = 'flex';
        byId('phrase-sentence').textContent = '';
        byId('phrase-options').innerHTML = '';
        byId('phrase-feedback').textContent = '';
        stopTimer();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    window.backToExerciseTypesFromPhrases = function backToExerciseTypesFromPhrases() {
        stopTimer();
        byId('phrase-screen').style.display = 'none';
        byId('exercise-types').style.display = 'flex';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    window.startPhrases = function startPhrases() {
        state.topic = window.activeExerciseTopic || 'CSS Frameworks';
        state.phrases = getPhrases(state.topic).map((phrase) => ({ ...phrase }));
        state.index = 0;
        state.score = 0;
        state.seconds = 90;
        state.locked = false;
        byId('phrase-start').style.display = 'none';
        byId('phrase-result').style.display = 'none';
        renderPhrase();
        startTimer();
    };
})();
