(function () {
  'use strict';

  // Highlight active sidebar link based on current path
  document.addEventListener('DOMContentLoaded', function () {
    var path = window.location.pathname.replace(/\/$/, '');
    var links = document.querySelectorAll('.sidebar-btn, .nav-btn');
    links.forEach(function (link) {
      var href = link.getAttribute('href') || '';
      var hrefPath = href.replace(/\/$/, '');
      if (hrefPath === path) {
        link.classList.add('active');
      }
    });
  });
})();
