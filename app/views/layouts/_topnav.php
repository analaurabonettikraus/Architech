<header class="topnav-wrap anim-header">
  <nav class="topnav">
    <div style="display:flex;align-items:center;gap:4px;">
      <a href="<?= BASE_URL ?>/"           class="nav-btn<?= ($activePage==='home')       ?' active':'' ?>">Principal</a>
      <a href="<?= BASE_URL ?>/exercicios" class="nav-btn<?= ($activePage==='exercicios') ?' active':'' ?>">Exercícios</a>
      <a href="<?= BASE_URL ?>/sobre"      class="nav-btn<?= ($activePage==='sobre')      ?' active':'' ?>">Sobre</a>
    </div>
    <?php if(isset($_SESSION['usuario_id'])): ?>
      <a href="<?= BASE_URL ?>/logout" class="nav-btn" style="padding-left:12px;padding-right:12px;gap:9px;">
        <img style="width:18px;height:18px;" src="<?= ASSETS ?>/images/icon-park-outline-people.svg" alt=""/>
        Sair
      </a>
    <?php else: ?>
      <a href="<?= BASE_URL ?>/login" class="nav-btn<?= (in_array($activePage,['login','cadastro']))?' active':'' ?>" style="padding-left:12px;padding-right:12px;gap:9px;">
        <img style="width:18px;height:18px;" src="<?= ASSETS ?>/images/icon-park-outline-people.svg" alt=""/>
        Login/Cadastro
      </a>
    <?php endif; ?>
  </nav>
</header>
