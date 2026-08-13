(() => {
  'use strict';

  const byId = (id) => document.getElementById(id);
  const readJSON = (key, fallback) => { try { const value = JSON.parse(localStorage.getItem(key)); return value && typeof value === 'object' ? value : fallback; } catch (error) { return fallback; } };
  const learning = window.ArchitechProgress?.read ? window.ArchitechProgress.read() : readJSON('architech_learning_progress_v1', { correctAnswers: 0, answeredQuestions: 0, watchedVideos: [] });
  const projectsData = readJSON('architech_data', { folders: [], projects: [] });
  const projects = Array.isArray(projectsData.projects) ? projectsData.projects.length : 0;
  const watched = Array.isArray(learning.watchedVideos) ? learning.watchedVideos.length : 0;
  const correct = Math.max(0, Number(learning.correctAnswers) || 0);
  const answered = Math.max(0, Number(learning.answeredQuestions) || 0);
  const exercisePercent = answered ? Math.round((correct / answered) * 100) : 0;
  const totalPercent = Math.min(100, Math.round((correct * 4) + (watched * 10) + (projects * 13)));
  const levels = totalPercent < 25 ? 'iniciante' : totalPercent < 60 ? 'curioso' : totalPercent < 85 ? 'amador' : 'avançado';
  const nextTarget = totalPercent < 25 ? 25 : totalPercent < 60 ? 60 : totalPercent < 85 ? 85 : 100;
  const remaining = Math.max(0, Math.ceil((nextTarget - totalPercent) / 4));
  const username = String(document.querySelector('.profile-name')?.textContent || 'estudante').trim().toLocaleLowerCase('pt-BR').normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^a-z0-9]+/g, '').slice(0, 18) || 'estudante';

  byId('profile-username').textContent = `@${username}`;
  byId('profile-correct-count').textContent = correct;
  byId('profile-exercise-percent').textContent = `${exercisePercent}%`;
  byId('profile-watched-count').textContent = watched;
  byId('profile-project-count').textContent = projects;
  byId('profile-level-name').textContent = levels;
  byId('profile-level-percent').textContent = `${totalPercent}%`;
  requestAnimationFrame(() => { byId('profile-level-fill').style.width = `${totalPercent}%`; });
  byId('profile-level-message').textContent = totalPercent >= 100 ? 'Você alcançou o nível máximo atual. Continue aprendendo!' : `Faltam cerca de ${remaining || 1} acertos para o próximo marco de progresso.`;
  byId('profile-stat-note').textContent = answered ? `Você acertou ${correct} de ${answered} respostas registradas. Projetos e vídeoaulas também contam para o seu nível.` : 'Resolva exercícios, assista vídeoaulas e crie projetos para construir seu progresso.';
})();
