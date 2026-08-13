(() => {
    'use strict';

    const flashcardSets = {
        'CSS Frameworks': [
            { front: 'O que é Bootstrap?', back: 'Um framework de front-end com componentes e utilitários CSS para criar interfaces responsivas.' },
            { front: 'Para que serve a classe .container?', back: 'Ela centraliza o conteúdo e aplica larguras responsivas conforme o tamanho da tela.' },
            { front: 'O que o Tailwind CSS oferece?', back: 'Classes utilitárias para montar interfaces diretamente no HTML com rapidez e consistência.' },
            { front: 'Qual a principal vantagem de um framework CSS?', back: 'Acelerar a criação de layouts usando componentes e padrões já preparados.' }
        ],
        'Responsividade': [
            { front: 'O que significa design responsivo?', back: 'É a adaptação de uma interface a celulares, tablets e computadores.' },
            { front: 'O que são media queries?', back: 'Regras CSS que aplicam estilos diferentes conforme características da tela, como largura e orientação.' },
            { front: 'Qual unidade ajuda elementos a se adaptarem ao espaço disponível?', back: 'A porcentagem (%), pois calcula o tamanho em relação ao elemento pai.' },
            { front: 'Por que testar em telas diferentes?', back: 'Para garantir boa leitura, navegação e organização em todos os dispositivos.' }
        ],
        'Decore as tags': [
            { front: 'Para que serve a tag <h1>?', back: 'Ela representa o título principal de uma página ou seção.' },
            { front: 'Qual tag cria um link?', back: 'A tag <a>, normalmente usada com o atributo href.' },
            { front: 'Qual tag exibe uma imagem?', back: 'A tag <img>, usando src para o arquivo e alt para a descrição alternativa.' },
            { front: 'Para que serve a tag <p>?', back: 'Ela cria um parágrafo de texto.' }
        ],
        'Transições': [
            { front: 'O que faz a propriedade transition?', back: 'Ela cria uma mudança suave entre valores CSS, como cor, tamanho ou opacidade.' },
            { front: 'Quando :hover é utilizado?', back: 'Quando o cursor do mouse passa sobre um elemento.' },
            { front: 'O que 0.3s representa em transition: opacity 0.3s?', back: 'A duração de 0,3 segundo para a transição ocorrer.' },
            { front: 'Qual propriedade pode alterar a escala de um elemento?', back: 'transform: scale(), frequentemente usada junto a uma transition.' }
        ],
        'Animações': [
            { front: 'Para que serve @keyframes?', back: 'Para definir os estados ou etapas de uma animação CSS.' },
            { front: 'Qual propriedade associa um elemento a uma animação?', back: 'A propriedade animation.' },
            { front: 'O que animation-iteration-count: infinite faz?', back: 'Repete a animação continuamente.' },
            { front: 'Qual propriedade define o tempo de uma animação?', back: 'animation-duration.' }
        ]
    };

    const state = {
        cards: [],
        index: 0,
        score: 0,
        seconds: 90,
        flipped: false,
        timer: null,
        topic: 'CSS Frameworks'
    };

    const byId = (id) => document.getElementById(id);

    function formatTime(totalSeconds) {
        const minutes = Math.floor(totalSeconds / 60);
        const seconds = String(totalSeconds % 60).padStart(2, '0');
        return `${minutes}:${seconds}`;
    }

    function getCards(topic) {
        return flashcardSets[topic] || flashcardSets['CSS Frameworks'];
    }

    function stopTimer() {
        if (state.timer) {
            window.clearInterval(state.timer);
            state.timer = null;
        }
    }

    function updateStatus() {
        byId('flash-time').textContent = formatTime(state.seconds);
        byId('flash-score').textContent = `✓${state.score}`;
        const progress = state.cards.length ? (state.index / state.cards.length) * 100 : 0;
        byId('flash-progress-bar').style.width = `${progress}%`;
    }

    function startTimer() {
        stopTimer();
        state.timer = window.setInterval(() => {
            state.seconds -= 1;
            updateStatus();
            if (state.seconds <= 0) showResult(true);
        }, 1000);
    }

    function renderCard() {
        const current = state.cards[state.index];
        if (!current) {
            showResult(false);
            return;
        }
        state.flipped = false;
        byId('flash-card').classList.remove('is-flipped');
        byId('flash-front-text').textContent = current.front;
        byId('flash-back-text').textContent = current.back;
        updateStatus();
    }

    function showResult(timeout) {
        stopTimer();
        byId('flash-progress-bar').style.width = '100%';
        byId('flash-result-topic').textContent = state.topic;
        const intro = timeout ? 'O tempo terminou.' : 'Você concluiu todos os flashcards!';
        byId('flash-result-text').textContent = `${intro} Você revisou ${state.score} de ${state.cards.length} cartões.`;
        window.ArchitechProgress?.recordExercise('flashcards', state.score, state.cards.length);
        byId('flash-result').style.display = 'flex';
    }

    window.openFlashcards = function openFlashcards() {
        state.topic = window.activeExerciseTopic || 'CSS Frameworks';
        byId('exercise-types').style.display = 'none';
        byId('flash-screen').style.display = 'flex';
        byId('flash-start-topic').textContent = state.topic;
        byId('flash-result').style.display = 'none';
        byId('flash-start').style.display = 'flex';
        byId('flash-front-text').textContent = '';
        byId('flash-back-text').textContent = '';
        byId('flash-card').classList.remove('is-flipped');
        stopTimer();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    window.backToExerciseTypesFromFlash = function backToExerciseTypesFromFlash() {
        stopTimer();
        byId('flash-screen').style.display = 'none';
        byId('exercise-types').style.display = 'flex';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    window.startFlashcards = function startFlashcards() {
        state.topic = window.activeExerciseTopic || 'CSS Frameworks';
        state.cards = getCards(state.topic).map((card) => ({ ...card }));
        state.index = 0;
        state.score = 0;
        state.seconds = 90;
        state.flipped = false;
        byId('flash-start').style.display = 'none';
        byId('flash-result').style.display = 'none';
        renderCard();
        startTimer();
    };

    window.flipFlashcard = function flipFlashcard() {
        if (!state.cards.length || byId('flash-start').style.display !== 'none') return;
        state.flipped = !state.flipped;
        byId('flash-card').classList.toggle('is-flipped', state.flipped);
    };

    window.nextFlashcard = function nextFlashcard() {
        if (!state.cards.length || byId('flash-start').style.display !== 'none') return;
        if (!state.flipped) {
            window.flipFlashcard();
            return;
        }
        state.score += 1;
        state.index += 1;
        renderCard();
    };
})();
