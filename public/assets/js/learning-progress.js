(() => {
  'use strict';

  const KEY = 'architech_learning_progress_v1';
  const defaults = () => ({ correctAnswers: 0, answeredQuestions: 0, completedActivities: 0, watchedVideos: [], modules: 0, byType: {} });

  function read() {
    try {
      const stored = JSON.parse(localStorage.getItem(KEY));
      return stored && typeof stored === 'object' ? { ...defaults(), ...stored, watchedVideos: Array.isArray(stored.watchedVideos) ? stored.watchedVideos : [], byType: stored.byType || {} } : defaults();
    } catch (error) { return defaults(); }
  }

  function write(progress) { localStorage.setItem(KEY, JSON.stringify(progress)); return progress; }

  function recordExercise(type, correctAnswers, totalQuestions) {
    const progress = read();
    const correct = Math.max(0, Number(correctAnswers) || 0);
    const total = Math.max(0, Number(totalQuestions) || 0);
    progress.correctAnswers += correct;
    progress.answeredQuestions += total;
    progress.completedActivities += 1;
    progress.byType[type] = progress.byType[type] || { correctAnswers: 0, answeredQuestions: 0, completed: 0 };
    progress.byType[type].correctAnswers += correct;
    progress.byType[type].answeredQuestions += total;
    progress.byType[type].completed += 1;
    return write(progress);
  }

  function recordWatchedVideo(videoId) {
    if (!videoId) return read();
    const progress = read();
    if (!progress.watchedVideos.includes(videoId)) progress.watchedVideos.push(videoId);
    return write(progress);
  }

  window.ArchitechProgress = { read, recordExercise, recordWatchedVideo };
})();
