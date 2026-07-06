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
      <h1 class="font-pixelify text-5xl font-semibold tracking-[8px] text-white text-center" style="text-shadow:-6px 6px 0 #00000040;">SOBRE</h1>
      <div class="card-glass rounded-[38px] px-12 py-10 max-w-xl text-center">
        <p class="font-urbanist text-white/90 text-base leading-relaxed">
          A <strong>Architech</strong> é uma plataforma de aprendizado para desenvolvedores frontend. Oferecemos vídeoaulas, exercícios práticos, fórum comunitário e uma IA integrada para acelerar seu crescimento como desenvolvedor.
        </p>
        <p class="font-urbanist text-white/70 text-sm mt-4">Contato: architech.dev@gmail.com</p>
      </div>
    </section>
    <footer class="relative z-10 mt-auto flex justify-center pt-6">
      <p class="font-urbanist text-sm text-white/60">© Architech. Todos os direitos reservados.</p>
    </footer>
  </div>
</main>
