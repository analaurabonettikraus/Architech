<?php $activePage = 'videoaulas'; ?>
<main class="relative min-h-screen w-full overflow-hidden">
  <div class="mx-auto flex min-h-screen w-full max-w-[1440px] flex-col px-3 pb-10 pt-3">
    <header class="relative z-10 flex items-start justify-between gap-6">
      <?php include ROOT . '/app/views/layouts/_sidebar.php'; ?>
      <div class="flex flex-1 justify-center px-2">
        <?php include ROOT . '/app/views/layouts/_topnav.php'; ?>
      </div>
      <div class="w-full max-w-[172px] shrink-0"></div>
    </header>
    <section class="flex flex-1 flex-col items-center justify-center py-16 gap-6">
      <h1 class="font-pixelify text-5xl font-semibold tracking-[8px] text-white text-center" style="text-shadow:-6px 6px 0 #00000040;">VÍDEOAULAS</h1>
      <p class="font-urbanist text-lg text-white/80 text-center max-w-md">Acesse nossas aulas em vídeo sobre desenvolvimento.</p>
      <div class="card-glass rounded-[38px] px-12 py-10 text-center mt-4">
        <p class="font-urbanist text-white/70 text-base">Em breve. <a href="<?= BASE_URL ?>/" class="underline text-white hover:text-white/80 transition-colors">Voltar ao início</a></p>
      </div>
    </section>
    <footer class="relative z-10 mt-auto flex justify-center pt-6">
      <p class="font-urbanist text-sm text-white/60">© Architech. Todos os direitos reservados.</p>
    </footer>
  </div>
</main>
