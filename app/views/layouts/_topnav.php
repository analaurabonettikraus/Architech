<nav class="mt-[2px] flex min-h-[42px] w-full max-w-[616px] items-center justify-between rounded-[26px] px-[18px] py-[6px]"
  style="background:linear-gradient(180deg,rgba(255,255,255,.18) 0%,rgba(255,255,255,.10) 100%);box-shadow:0 4px 8px #00000033,inset 0 1px 0 #ffffff1a;">
  <div class="flex items-center gap-1">
    <a href="<?= BASE_URL ?>/" class="nav-btn <?= ($activePage==='home')?'active':'' ?> font-urbanist text-base font-bold text-white">Principal</a>
    <a href="<?= BASE_URL ?>/exercicios" class="nav-btn <?= ($activePage==='exercicios')?'active':'' ?> font-urbanist text-base font-bold text-white">Exercícios</a>
    <a href="<?= BASE_URL ?>/sobre" class="nav-btn <?= ($activePage==='sobre')?'active':'' ?> font-urbanist text-base font-bold text-white">Sobre</a>
  </div>
  <a href="<?= BASE_URL ?>/login" class="nav-btn <?= (in_array($activePage,['login','cadastro']))?'active':'' ?> flex items-center gap-2 font-urbanist text-base font-bold text-white">
    <img class="h-[18px] w-[18px]" alt="Login" src="<?= ASSETS ?>/images/icon-park-outline-people.svg" />
    <span>Login/Cadastro</span>
  </a>
</nav>
