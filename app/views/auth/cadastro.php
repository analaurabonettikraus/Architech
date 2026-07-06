<?php $sidebarItems = [
  ['label' => 'Perfil', 'icon' => 'ix-user-profile-filled.svg', 'link' => 'login'],
  ['label' => 'Meus projetos', 'icon' => 'solar-folder-with-files-bold.svg', 'link' => 'projetos'],
  ['label' => 'Vídeoaulas', 'icon' => 'tabler-book-filled.svg', 'link' => 'videoaulas'],
  ['label' => 'Nossa IA', 'icon' => 'streamline-artificial-intelligence-spark-solid.svg', 'link' => 'ia'],
  ['label' => 'Fórum', 'icon' => 'healthicons-group-discussion-meetingx3.svg', 'link' => 'forum'],
]; ?>
<main class="relative min-h-screen w-full overflow-hidden">
  <div class="mx-auto flex min-h-screen w-full max-w-[1440px] flex-col px-3 pb-10 pt-3">
    <header class="relative z-10 flex items-start justify-between gap-6">
      <aside class="w-full max-w-[172px] shrink-0">
        <div class="card-glass min-h-[393px] rounded-[38px]">
          <div class="flex h-full flex-col items-center px-4 pb-6 pt-4">
            <div class="mb-4 flex flex-col items-center">
              <img class="h-12 w-12 object-cover" alt="Architech"
                src="<?= ASSETS ?>/images/c244a778-6383-491d-b2f6-58d02d819c9e-1.png" />
              <span class="mt-1 font-pixelify text-[11px] font-semibold tracking-[1.21px] text-white whitespace-nowrap"
                style="text-shadow:0 4px 4px #00000040;">ARCHITECH</span>
            </div>
            <nav class="w-full">
              <ul class="flex flex-col gap-[15px]">
                <?php foreach ($sidebarItems as $item): ?>
                  <li><a href="<?= BASE_URL . '/' . $item['link'] ?>"
                      class="sidebar-btn flex items-center gap-3 w-full rounded-[32px] px-[14px] py-[10px]">
                      <img class="w-[30px] h-[30px] shrink-0" alt="" src="<?= ASSETS ?>/images/<?= $item['icon'] ?>" />
                      <span class="font-urbanist text-2xl font-bold text-white"
                        style="text-shadow:0 4px 4px #00000040;"><?= htmlspecialchars($item['label']) ?></span>
                    </a></li>
                <?php endforeach; ?>
              </ul>
            </nav>
          </div>
        </div>
      </aside>
      <div class="flex flex-1 justify-center px-2">
        <nav
          class="mt-[2px] flex min-h-[42px] w-full max-w-[616px] items-center justify-between rounded-[26px] px-[18px] py-[6px]"
          style="background:linear-gradient(180deg,rgba(255,255,255,.18) 0%,rgba(255,255,255,.10) 100%);box-shadow:0 4px 8px #00000033,inset 0 1px 0 #ffffff1a;">
          <div class="flex items-center gap-1">
            <a href="<?= BASE_URL ?>/" class="nav-btn font-urbanist text-base font-bold text-white">Principal</a>
            <a href="<?= BASE_URL ?>/exercicios"
              class="nav-btn font-urbanist text-base font-bold text-white">Exercícios</a>
            <a href="<?= BASE_URL ?>/sobre" class="nav-btn font-urbanist text-base font-bold text-white">Sobre</a>
          </div>
          <a href="<?= BASE_URL ?>/login"
            class="nav-btn active flex items-center gap-2 font-urbanist text-base font-bold text-white">
            <img class="h-[18px] w-[18px]" alt="Login" src="<?= ASSETS ?>/images/icon-park-outline-people.svg" />
            <span>Login/Cadastro</span>
          </a>
        </nav>
      </div>
      <div class="w-full max-w-[172px] shrink-0"></div>
    </header>

    <section class="flex flex-1 items-center justify-center py-16">
      <div class="card-glass w-full max-w-md rounded-[38px] p-8">
        <h2 class="font-pixelify text-3xl font-semibold text-white text-center mb-6"
          style="text-shadow:-4px 4px 0 #00000040;">CADASTRO</h2>
        <?php if (!empty($error)): ?>
          <div class="mb-4 rounded-xl bg-red-500/30 border border-red-400/40 px-4 py-3 text-white font-urbanist text-sm">
            <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
          <div
            class="mb-4 rounded-xl bg-green-500/30 border border-green-400/40 px-4 py-3 text-white font-urbanist text-sm">
            <?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        <form method="POST" action="<?= BASE_URL ?>/cadastro" class="flex flex-col gap-4">
          <div>
            <label class="font-urbanist text-sm font-bold text-white mb-1 block">Usuário</label>
            <input type="text" name="username" required placeholder="Escolha um nome de usuário"
              class="w-full rounded-[16px] px-4 py-3 font-urbanist text-white placeholder-white/50 outline-none border border-white/20 focus:border-white/50 transition-colors"
              style="background:rgba(255,255,255,.12);" />
          </div>
          <div>
            <label class="font-urbanist text-sm font-bold text-white mb-1 block">Senha</label>
            <input type="password" name="password" required placeholder="Mínimo 6 caracteres"
              class="w-full rounded-[16px] px-4 py-3 font-urbanist text-white placeholder-white/50 outline-none border border-white/20 focus:border-white/50 transition-colors"
              style="background:rgba(255,255,255,.12);" />
          </div>
          <div>
            <label class="font-urbanist text-sm font-bold text-white mb-1 block">Confirmar Senha</label>
            <input type="password" name="confirm" required placeholder="Repita a senha"
              class="w-full rounded-[16px] px-4 py-3 font-urbanist text-white placeholder-white/50 outline-none border border-white/20 focus:border-white/50 transition-colors"
              style="background:rgba(255,255,255,.12);" />
          </div>
          <button type="submit"
            class="btn-primary mt-2 w-full rounded-[20px] py-3 font-urbanist text-base font-bold text-white">Criar
            conta</button>
        </form>
        <p class="mt-4 text-center font-urbanist text-sm text-white/80">
          Já tem conta? <a href="<?= BASE_URL ?>/login" class="underline hover:text-white transition-colors">Faça
            login</a>
        </p>
      </div>
    </section>

    <footer class="relative z-10 mt-auto flex justify-center pt-6">
      <p class="font-urbanist text-sm text-white/60">© Architech. Todos os direitos reservados.</p>
    </footer>
  </div>
</main>