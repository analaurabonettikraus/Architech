(() => {
    'use strict';

    const questionSets = {
        'CSS Frameworks': [
            {
                question: 'Bootstrap é usado principalmente para desenvolver com:',
                options: ['HTML e CSS responsivos', 'Banco de dados SQL', 'Aplicações em PHP puro', 'Servidores de e-mail'],
                correct: 0,
                explanation: 'Bootstrap é um framework de front-end voltado para interfaces responsivas.'
            },
            {
                question: 'Qual classe do Bootstrap cria um container responsivo?',
                options: ['.container', '.route', '.schema', '.server'],
                correct: 0,
                explanation: 'A classe .container centraliza e adapta o conteúdo aos diferentes tamanhos de tela.'
            },
            {
                question: 'Um framework CSS ajuda principalmente a:',
                options: ['Criar componentes e layouts com mais rapidez', 'Substituir o JavaScript', 'Hospedar um site automaticamente', 'Criar bancos de dados'],
                correct: 0,
                explanation: 'Frameworks CSS disponibilizam padrões, componentes e utilitários para a interface.'
            }
        ],
        'Responsividade': [
            {
                question: 'O objetivo do design responsivo é:',
                options: ['Adaptar a interface a diferentes telas', 'Aumentar somente o tamanho das fontes', 'Remover o CSS do projeto', 'Criar apenas aplicações mobile'],
                correct: 0,
                explanation: 'Uma interface responsiva se adapta a celulares, tablets e computadores.'
            },
            {
                question: 'Qual recurso CSS é mais usado para criar pontos de quebra?',
                options: ['@media', '@font-face', '@keyframes', '@import'],
                correct: 0,
                explanation: 'As media queries permitem aplicar estilos conforme largura, altura ou orientação da tela.'
            },
            {
                question: 'Qual unidade tende a ser mais flexível em layouts responsivos?',
                options: ['%', 'px fixo em todos os elementos', 'pt', 'cm'],
                correct: 0,
                explanation: 'Porcentagens ajudam os blocos a se ajustarem proporcionalmente ao espaço disponível.'
            }
        ],
        'Decore as tags': [
            {
                question: 'Qual tag HTML é usada para o título principal da página?',
                options: ['<h1>', '<p>', '<img>', '<footer>'],
                correct: 0,
                explanation: 'A tag <h1> representa o título de maior nível de uma página.'
            },
            {
                question: 'Qual tag cria um link para outra página?',
                options: ['<a>', '<div>', '<span>', '<section>'],
                correct: 0,
                explanation: 'A tag <a> cria hyperlinks por meio do atributo href.'
            },
            {
                question: 'Qual tag é apropriada para inserir uma imagem?',
                options: ['<img>', '<picture-text>', '<image>', '<media>'],
                correct: 0,
                explanation: 'A tag <img> utiliza, entre outros, os atributos src e alt.'
            }
        ],
        'Transições': [
            {
                question: 'Qual propriedade CSS controla a mudança suave entre estados?',
                options: ['transition', 'transform-only', 'display', 'position'],
                correct: 0,
                explanation: 'A propriedade transition anima mudanças de valores CSS entre estados.'
            },
            {
                question: 'Qual pseudo-classe é muito usada para iniciar uma transição no mouse?',
                options: [':hover', ':root', ':empty', ':checked-only'],
                correct: 0,
                explanation: 'A pseudo-classe :hover é ativada quando o cursor passa sobre o elemento.'
            },
            {
                question: 'Em transition: opacity 0.3s, o valor 0.3s indica:',
                options: ['A duração da transição', 'A largura do elemento', 'O número de quadros', 'A opacidade máxima'],
                correct: 0,
                explanation: 'O valor em segundos define quanto tempo a transição deve levar.'
            }
        ],
        'Animações': [
            {
                question: 'Qual regra CSS declara os estágios de uma animação?',
                options: ['@keyframes', '@media', '@supports', '@font-face'],
                correct: 0,
                explanation: 'A regra @keyframes descreve os estados intermediários da animação.'
            },
            {
                question: 'Qual propriedade inicia uma animação criada com @keyframes?',
                options: ['animation', 'transition', 'filter', 'outline'],
                correct: 0,
                explanation: 'A propriedade animation associa um elemento a uma sequência de keyframes.'
            },
            {
                question: 'animation-iteration-count: infinite faz a animação:',
                options: ['Repetir continuamente', 'Executar uma vez', 'Ficar invisível', 'Aumentar a fonte'],
                correct: 0,
                explanation: 'O valor infinite mantém a animação em repetição contínua.'
            }
        ]
    };

    const state = {
        questions: [],
        index: 0,
        score: 0,
        seconds: 90,
        timer: null,
        locked: false,
        topic: 'CSS Frameworks'
    };

    const byId = (id) => document.getElementById(id);

    function getQuestionSet(topic) {
        return questionSets[topic] || questionSets['CSS Frameworks'];
    }

    function formatTime(totalSeconds) {
        const minutes = Math.floor(totalSeconds / 60);
        const seconds = String(totalSeconds % 60).padStart(2, '0');
        return `${minutes}:${seconds}`;
    }

    function updateStatus() {
        byId('quiz-time').textContent = formatTime(state.seconds);
        byId('quiz-score').textContent = `✓${state.score}`;
        const progress = state.questions.length ? (state.index / state.questions.length) * 100 : 0;
        byId('quiz-progress-bar').style.width = `${progress}%`;
    }

    function stopTimer() {
        if (state.timer) {
            window.clearInterval(state.timer);
            state.timer = null;
        }
    }

    function startTimer() {
        stopTimer();
        state.timer = window.setInterval(() => {
            state.seconds -= 1;
            updateStatus();
            if (state.seconds <= 0) showResult(true);
        }, 1000);
    }

    function renderQuestion() {
        const current = state.questions[state.index];
        if (!current) {
            showResult(false);
            return;
        }
        state.locked = false;
        byId('quiz-question').textContent = current.question;
        byId('quiz-feedback').textContent = '';
        const optionsContainer = byId('quiz-options');
        optionsContainer.innerHTML = '';

        current.options.forEach((option, optionIndex) => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'quiz-option';
            button.textContent = `${String.fromCharCode(97 + optionIndex)}) ${option}`;
            button.addEventListener('click', () => chooseAnswer(optionIndex));
            optionsContainer.appendChild(button);
        });
        updateStatus();
    }

    function chooseAnswer(optionIndex) {
        if (state.locked) return;
        state.locked = true;
        const current = state.questions[state.index];
        const options = [...byId('quiz-options').querySelectorAll('.quiz-option')];
        options.forEach((button, index) => {
            button.disabled = true;
            if (index === current.correct) button.classList.add('is-correct');
            if (index === optionIndex && index !== current.correct) button.classList.add('is-wrong');
        });

        const correct = optionIndex === current.correct;
        if (correct) state.score += 1;
        byId('quiz-feedback').textContent = correct ? 'Resposta correta! Muito bem.' : current.explanation;
        updateStatus();

        window.setTimeout(() => {
            state.index += 1;
            renderQuestion();
        }, correct ? 950 : 1750);
    }

    function showResult(timeout) {
        stopTimer();
        byId('quiz-progress-bar').style.width = '100%';
        byId('quiz-result-topic').textContent = state.topic;
        const base = timeout ? 'O tempo terminou.' : 'Questionário concluído!';
        byId('quiz-result-text').textContent = `${base} Você acertou ${state.score} de ${state.questions.length} perguntas.`;
        window.ArchitechProgress?.recordExercise('questionario', state.score, state.questions.length);
        byId('quiz-result').style.display = 'flex';
    }

    window.openQuiz = function openQuiz() {
        state.topic = window.activeExerciseTopic || 'CSS Frameworks';
        document.getElementById('exercise-types').style.display = 'none';
        document.getElementById('quiz-screen').style.display = 'flex';
        byId('quiz-start-topic').textContent = state.topic;
        byId('quiz-result').style.display = 'none';
        byId('quiz-start').style.display = 'flex';
        byId('quiz-question').textContent = '';
        byId('quiz-options').innerHTML = '';
        byId('quiz-feedback').textContent = '';
        stopTimer();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    window.backToExerciseTypes = function backToExerciseTypes() {
        stopTimer();
        document.getElementById('quiz-screen').style.display = 'none';
        document.getElementById('exercise-types').style.display = 'flex';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    window.startQuiz = function startQuiz() {
        state.topic = window.activeExerciseTopic || 'CSS Frameworks';
        state.questions = getQuestionSet(state.topic).map((question) => ({ ...question }));
        state.index = 0;
        state.score = 0;
        state.seconds = 90;
        state.locked = false;
        byId('quiz-start').style.display = 'none';
        byId('quiz-result').style.display = 'none';
        renderQuestion();
        startTimer();
    };
})();
