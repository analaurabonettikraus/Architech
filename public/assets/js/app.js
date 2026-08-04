(function(){
  'use strict';
  document.addEventListener('DOMContentLoaded',function(){
    var path = window.location.pathname.replace(/\/$/,'');
    document.querySelectorAll('.sidebar-btn,.nav-btn').forEach(function(el){
      var href = (el.getAttribute('href')||'').replace(/\/$/,'');
      if (href === path) el.classList.add('active');
    });
  });
})();
