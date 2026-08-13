(() => {
  'use strict';

  const HISTORY_KEY = 'architech_devzinho_history_v2';
  const VIDEO_REVIEW_KEY = 'architech_video_exercise_review_v1';
  const log = document.getElementById('devzinho-chat-log');
  const form = document.getElementById('devzinho-form');
  const input = document.getElementById('devzinho-input');
  const historyList = document.getElementById('devzinho-history-list');
  const clearHistoryButton = document.getElementById('history-clear');
  const historyModal = document.getElementById('history-modal');
  const historyModalBody = document.getElementById('history-modal-body');
  const historyModalClose = document.getElementById('history-modal-close');
  if (!log || !form || !input || !historyList) return;

  const initialMarkup = log.innerHTML;
  let activeMessages = [];
  let archivedCurrentChat = false;
  let responseTimer = null;

  const normalize = (text) => String(text || '').toLocaleLowerCase('pt-BR').normalize('NFD').replace(/[\u0300-\u036f]/g, '');
  const scopeTerms = ['architech','projeto','projetos','pasta','pastas','editor','codigo','programacao','programar','desenvolvimento','desenvolvedor','site','pagina','web','frontend','backend','html','css','javascript','typescript','php','python','react','vue','angular','node','api','banco','sql','git','github','bug','erro','responsivo','responsividade','bootstrap','tailwind','framework','exercicio','exercicios','flashcard','questionario','aula','videoaula','login','cadastro','perfil','publicar','postar','salvar','rodar','executar','preview','layout','interface','ui','ux'];
  const greetingTerms = ['ola','oi','bom dia','boa tarde','boa noite','tudo bem','quem e voce','quem e vc','devzinho'];
  const offTopicTerms = ['previsao do tempo','clima','horoscopo','futebol','filme','musica','receita','namoro','politica','fofoca','celebridade'];

  function isInScope(message) {
    const normalized = normalize(message);
    return scopeTerms.some((term) => normalized.includes(term)) || greetingTerms.some((term) => normalized.includes(term));
  }

  function getResponse(message) {
    const text = normalize(message);
    const has = (...terms) => terms.some((term) => text.includes(term));
    if (offTopicTerms.some((term) => text.includes(term)) || !isInScope(text)) return 'Eu sou o Devzinho e fui preparado para ajudar exclusivamente com o Architech, desenvolvimento web e programação. Que tal voltarmos para um projeto, uma dúvida de HTML/CSS/JavaScript ou algum recurso da plataforma?';
    if (greetingTerms.some((term) => text.includes(term)) && text.split(/\s+/).length < 8) return 'Olá! Posso ajudar com os recursos do Architech, seus projetos e dúvidas de programação. Em que você está trabalhando hoje?';
    if (has('projeto','projetos','pasta','pastas')) return 'Para organizar seu trabalho, abra “Meus projetos” no menu lateral. Na página você pode criar uma pasta, entrar nela e usar “Criar novo projeto”. Os projetos ficam salvos no navegador e podem ser abertos novamente pelo card correspondente.';
    if (has('editor','codigo','codig','preview','rodar','executar','salvar')) return 'No editor do Architech, use as abas HTML, CSS e JS para editar cada parte do projeto. A coluna à esquerda mostra as linhas do código. Use o botão de play para atualizar o preview e o ícone de salvar para guardar as alterações do projeto.';
    if (has('html')) return 'HTML define a estrutura do conteúdo. Use tags semânticas como <header>, <main>, <section>, <article> e <footer> quando fizer sentido. Para começar, me diga qual elemento ou página você quer montar.';
    if (has('css','estilo','layout','responsiv','tailwind','bootstrap')) return 'CSS cuida da apresentação da página. Para layouts responsivos, comece com flexbox ou grid e use media queries para telas menores. Se quiser, envie seu objetivo ou um trecho de CSS e eu sugiro uma estrutura.';
    if (has('javascript','js ',' javascript','evento','funcao','função','dom')) return 'JavaScript adiciona comportamento à interface. Um bom caminho é selecionar elementos com querySelector, ouvir eventos como click e manter as funções pequenas e focadas. Qual interação você quer implementar?';
    if (has('php','backend','api','banco','sql')) return 'Para recursos do lado do servidor, separe rotas, controladores e views. No Architech, mantenha a interface nas views e as regras de negócio nos controladores. Posso ajudar a planejar uma rota, formulário ou consulta de dados.';
    if (has('erro','bug','nao funciona','não funciona')) return 'Vamos investigar. Me envie a mensagem de erro, o trecho de código relevante e o comportamento esperado. Com isso consigo indicar a causa provável e uma correção passo a passo.';
    if (has('exercicio','exercicios','questionario','flashcard','flash card')) return 'Na área Exercícios, escolha um tema e depois a modalidade desejada: Questionário, Flash Cards, Abra a Caixa ou Complete a Frase. Todas possuem cronômetro, progresso e resultado ao final.';
    if (has('login','cadastro','perfil')) return 'Você pode acessar Login/Cadastro pelo topo da página. Depois de entrar, use Perfil para conferir seus dados. Para trabalhar no código, a área principal é Meus projetos.';
    return 'Posso ajudar com desenvolvimento web e programação. Você pode me perguntar sobre HTML, CSS, JavaScript, PHP, responsividade, organização de projetos ou como usar as áreas do Architech.';
  }

  function getHistory() {
    try {
      const history = JSON.parse(localStorage.getItem(HISTORY_KEY));
      return Array.isArray(history) ? history : [];
    } catch (error) { return []; }
  }

  function saveHistory(history) {
    localStorage.setItem(HISTORY_KEY, JSON.stringify(history.slice(-12)));
  }

  function getSeedMessages() {
    return [{ role: 'user', text: 'Olá Devzinho! Como posso acessar meus projetos postados?' }, { role: 'assistant', text: 'Essa é uma ótima pergunta! Para ver os seus projetos, entre na aba “Meus projetos” no menu lateral. Lá você pode criar pastas, editar códigos, salvar projetos e organizar seus arquivos.' }];
  }

  function avatar(role) {
    const element = document.createElement('div');
    element.className = `chat-avatar chat-avatar--${role}`;
    if (role === 'devzinho') {
      const image = document.createElement('img');
      image.src = `${window.ASSETS || '/assets'}/images/devzinho-sentado.png`;
      image.alt = 'Devzinho';
      element.appendChild(image);
    } else { element.textContent = 'U'; element.setAttribute('aria-label', 'Você'); }
    return element;
  }

  function addMessage(role, text, track = true) {
    const row = document.createElement('div');
    row.className = `chat-row chat-row--${role === 'user' ? 'user' : 'assistant'}`;
    const bubble = document.createElement('div');
    bubble.className = `chat-bubble chat-bubble--${role === 'user' ? 'user' : 'assistant'}`;
    bubble.textContent = text;
    if (role === 'user') row.append(bubble, avatar('user')); else row.append(avatar('devzinho'), bubble);
    log.appendChild(row);
    log.scrollTop = log.scrollHeight;
    if (track) activeMessages.push({ role, text });
    return row;
  }

  function showTyping() {
    const row = document.createElement('div');
    row.className = 'chat-row chat-row--assistant';
    const bubble = document.createElement('div');
    bubble.className = 'chat-bubble chat-bubble--assistant devzinho-typing';
    bubble.setAttribute('aria-label', 'Devzinho está escrevendo');
    bubble.innerHTML = '<i></i><i></i><i></i>';
    row.append(avatar('devzinho'), bubble);
    log.appendChild(row);
    log.scrollTop = log.scrollHeight;
    return row;
  }

  function formatDate(isoDate) {
    return new Intl.DateTimeFormat('pt-BR', { dateStyle: 'short', timeStyle: 'short' }).format(new Date(isoDate));
  }

  function renderHistory() {
    const history = getHistory().slice().reverse();
    historyList.replaceChildren();
    if (!history.length) {
      const empty = document.createElement('p');
      empty.className = 'history-empty';
      empty.textContent = 'Nenhuma conversa salva ainda. Ao sair desta aba, sua conversa atual aparecerá aqui.';
      historyList.appendChild(empty);
      return;
    }
    history.forEach((conversation) => {
      const card = document.createElement('button');
      card.type = 'button'; card.className = 'history-card';
      const firstUser = conversation.messages.find((message) => message.role === 'user');
      const preview = firstUser?.text || 'Conversa com o Devzinho';
      card.innerHTML = `<strong>${conversation.messages.length - 2 > 0 ? 'Conversa com Devzinho' : 'Demonstração inicial'}</strong><span></span><time>${formatDate(conversation.createdAt)}</time>`;
      card.querySelector('span').textContent = preview;
      card.addEventListener('click', () => openHistoryConversation(conversation));
      historyList.appendChild(card);
    });
  }

  function openHistoryConversation(conversation) {
    historyModalBody.replaceChildren();
    conversation.messages.forEach((message) => {
      const block = document.createElement('div');
      block.className = `history-modal__message history-modal__message--${message.role}`;
      block.textContent = message.text;
      historyModalBody.appendChild(block);
    });
    historyModal.classList.add('is-open');
  }

  function closeHistoryModal() { historyModal.classList.remove('is-open'); }

  function archiveActiveChat() {
    if (archivedCurrentChat || activeMessages.length <= 2) return;
    const history = getHistory();
    history.push({ id: Date.now(), createdAt: new Date().toISOString(), messages: activeMessages });
    saveHistory(history);
    archivedCurrentChat = true;
    renderHistory();
  }

  function resetToCleanConversation() {
    window.clearTimeout(responseTimer);
    log.innerHTML = initialMarkup;
    activeMessages = getSeedMessages();
    archivedCurrentChat = false;
    input.value = '';
    renderHistory();
  }

  function createReturnToExercisesButton() {
    const button = document.createElement('button');
    button.type = 'button';
    button.className = 'chat-quick-return';
    button.textContent = 'Voltar aos exercícios';
    button.style.cssText = 'align-self:flex-start;margin:0 0 8px 59px;border:0;border-radius:999px;padding:9px 15px;background:#022a56;color:#fff;font-family:Urbanist,sans-serif;font-size:13px;font-weight:800;box-shadow:0 4px 0 rgba(0,0,0,.14);cursor:pointer;';
    button.addEventListener('click', () => {
      sessionStorage.removeItem(VIDEO_REVIEW_KEY);
      const basePath = window.location.pathname.split('/ia')[0];
      window.location.href = `${basePath}/videoaulas?exercise=resume`;
    });
    log.appendChild(button);
    log.scrollTop = log.scrollHeight;
  }

  function loadVideoReview() {
    try {
      const review = JSON.parse(sessionStorage.getItem(VIDEO_REVIEW_KEY) || 'null');
      if (!review?.errors?.length) return false;
      log.innerHTML = '';
      activeMessages = [];
      const errorSummary = review.errors.map((error, index) => `${index + 1}. ${error.prompt}\nSua resposta: ${error.selected}.\nResposta correta: ${error.correct}.\nExplicação: ${error.explanation}`).join('\n\n');
      addMessage('user', `Terminei a vídeoaula “${review.videoTitle}” e quero entender os ${review.errors.length} erro(s) que cometi.`);
      addMessage('assistant', `Vamos revisar juntos. Aqui estão as correções do seu módulo:\n\n${errorSummary}\n\nLeia as explicações e, quando estiver pronto, use o botão abaixo para voltar ao exercício e responder novamente apenas o que errou.`);
      createReturnToExercisesButton();
      return true;
    } catch (error) {
      sessionStorage.removeItem(VIDEO_REVIEW_KEY);
      return false;
    }
  }

  function sendMessage(rawMessage) {
    const message = String(rawMessage || '').trim();
    if (!message) return;
    addMessage('user', message);
    input.value = '';
    const typing = showTyping();
    const response = getResponse(message);
    responseTimer = window.setTimeout(() => {
      typing.remove();
      addMessage('assistant', response);
    }, 420);
  }

  activeMessages = getSeedMessages();
  const reviewingVideoExercise = loadVideoReview();
  if (!reviewingVideoExercise) renderHistory();

  form.addEventListener('submit', (event) => { event.preventDefault(); sendMessage(input.value); });
  document.querySelectorAll('[data-question]').forEach((button) => button.addEventListener('click', () => sendMessage(button.dataset.question)));
  clearHistoryButton.addEventListener('click', () => { if (window.confirm('Deseja apagar todas as conversas salvas?')) { localStorage.removeItem(HISTORY_KEY); renderHistory(); closeHistoryModal(); } });
  historyModalClose.addEventListener('click', closeHistoryModal);
  historyModal.addEventListener('click', (event) => { if (event.target === historyModal) closeHistoryModal(); });
  document.addEventListener('keydown', (event) => { if (event.key === 'Escape') closeHistoryModal(); });
  window.addEventListener('pagehide', archiveActiveChat);
  window.addEventListener('pageshow', (event) => { if (event.persisted) resetToCleanConversation(); });
})();
