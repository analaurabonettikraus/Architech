<?php
$sidebarItems = [
  ['label'=>'Perfil',        'icon'=>'ix-user-profile-filled.svg',                        'link'=>'login'],
  ['label'=>'Meus projetos', 'icon'=>'solar-folder-with-files-bold.svg',                  'link'=>'projetos'],
  ['label'=>'Vídeoaulas',    'icon'=>'tabler-book-filled.svg',                             'link'=>'videoaulas'],
  ['label'=>'Nossa IA',      'icon'=>'streamline-artificial-intelligence-spark-solid.svg', 'link'=>'ia'],
  ['label'=>'Fórum',         'icon'=>'healthicons-group-discussion-meetingx3.svg',         'link'=>'forum'],
];
$animClasses = ['anim-nav-item-1','anim-nav-item-2','anim-nav-item-3','anim-nav-item-4','anim-nav-item-5'];
?>
<main class="relative min-h-screen w-full overflow-hidden">
  <div class="mx-auto flex min-h-screen w-full max-w-[1440px] flex-col px-3 pb-10 pt-3">

    <!-- Header -->
    <header class="relative z-10 flex items-start justify-between gap-6">

      <!-- Sidebar -->
      <aside class="w-[220px] shrink-0 anim-sidebar">
        <div class="card-glass rounded-[38px]">
          <div class="flex flex-col items-center px-4 pb-6 pt-4">

            <!-- Logo -->
            <div class="mb-5 flex flex-col items-center">
              <img class="h-12 w-12 object-cover" alt="Architech" src="<?= ASSETS ?>/images/c244a778-6383-491d-b2f6-58d02d819c9e-1.png" />
              <span class="mt-1 font-pixelify text-[11px] font-semibold tracking-[1.21px] text-white whitespace-nowrap"
                    style="text-shadow:0 4px 4px #00000040;">ARCHITECH</span>
            </div>

            <!-- Nav items -->
            <nav class="w-full">
              <ul class="flex flex-col gap-[12px]">
                <?php foreach ($sidebarItems as $i => $item): ?>
                <li class="<?= $animClasses[$i] ?>">
                  <a href="<?= BASE_URL . '/' . $item['link'] ?>" class="sidebar-btn">
                    <img src="<?= ASSETS ?>/images/<?= $item['icon'] ?>" alt="<?= htmlspecialchars($item['label']) ?>" />
                    <span><?= htmlspecialchars($item['label']) ?></span>
                  </a>
                </li>
                <?php endforeach; ?>
              </ul>
            </nav>

          </div>
        </div>
      </aside>

      <!-- Top nav -->
      <div class="flex flex-1 justify-center px-2 anim-header">
        <nav class="mt-[2px] flex min-h-[42px] w-full max-w-[616px] items-center justify-between rounded-[26px] px-[18px] py-[6px]"
             style="background:linear-gradient(180deg,rgba(255,255,255,.18) 0%,rgba(255,255,255,.10) 100%);box-shadow:0 4px 8px #00000033,inset 0 1px 0 #ffffff1a;">
          <div class="flex items-center gap-1">
            <a href="<?= BASE_URL ?>/"          class="nav-btn active">Principal</a>
            <a href="<?= BASE_URL ?>/exercicios" class="nav-btn">Exercícios</a>
            <a href="<?= BASE_URL ?>/sobre"      class="nav-btn">Sobre</a>
          </div>
          <a href="<?= BASE_URL ?>/login" class="nav-btn" style="padding-left:12px;padding-right:12px;">
            <img class="w-[18px] h-[18px]" src="<?= ASSETS ?>/images/icon-park-outline-people.svg" alt="Login" />
            Login/Cadastro
          </a>
        </nav>
      </div>

      <div class="w-[220px] shrink-0"></div>
    </header>

    <!-- Hero -->
    <section class="relative flex flex-1 items-center justify-center">

      <!-- Floating background icons -->
      <img class="absolute pointer-events-none z-0 anim-float-1"
           style="left:32.55%;top:50%;margin-top:-160px;width:135px;height:138px;"
           src="<?= ASSETS ?>/images/group.png" alt="" />
      <img class="absolute pointer-events-none z-0 anim-float-2"
           style="right:195px;top:50%;margin-top:-190px;width:81px;height:86px;"
           src="<?= ASSETS ?>/images/tdesign-css3-filled.svg" alt="" />
      <img class="absolute pointer-events-none z-0 anim-float-3"
           style="left:42%;top:50%;margin-top:140px;width:89px;height:94px;"
           src="<?= ASSETS ?>/images/polygon-1.svg" alt="" />
      <img class="absolute pointer-events-none z-0 anim-float-4"
           style="right:225px;top:50%;margin-top:110px;width:105px;height:105px;"
           src="<?= ASSETS ?>/images/akar-icons-javascript-fill.png" alt="" />
      <img class="absolute pointer-events-none z-0 anim-float-5"
           style="right:137px;top:50%;margin-top:-60px;width:113px;height:113px;"
           src="<?= ASSETS ?>/images/flowbite-html-solid.svg" alt="" />

      <!-- Title -->
      <h1 class="relative z-10 text-center font-pixelify text-[78px] font-semibold tracking-[14.08px] text-white anim-title"
          style="text-shadow:-11px 10px 0 #00000040;">ARCHITECH</h1>
    </section>

    <!-- Footer -->
    <footer class="relative z-10 mt-auto flex justify-center pt-10 anim-footer">
      <div class="w-full max-w-[1214px] rounded-[56px]"
           style="background:#d9d9d91a;box-shadow:0 4px 4px #00000040,inset 0 4px 4px #00000040;">
        <div class="grid items-center gap-8 px-10 py-6"
             style="grid-template-columns:180px 1px minmax(0,1fr) auto;min-height:146px;">

          <!-- Logo -->
          <div class="flex flex-col items-center justify-center">
            <img class="h-[92px] w-[92px] object-cover"
                 src="<?= ASSETS ?>/images/c244a778-6383-491d-b2f6-58d02d819c9e-1.png" alt="Architech" />
            <span class="mt-1 font-pixelify text-xl font-semibold tracking-[2.20px] text-white whitespace-nowrap"
                  style="text-shadow:0 4px 4px #00000040;">ARCHITECH</span>
          </div>

          <!-- Divider -->
          <img class="h-[118px] w-[9px] self-center" src="<?= ASSETS ?>/images/line-1.svg" alt="" />

          <!-- Nav + copyright -->
          <div class="flex flex-col items-center justify-center gap-3">
            <div class="flex items-center rounded-[20px] px-6 py-3"
                 style="background:#ffffff1a;box-shadow:0 4px 4px #00000033;">
              <a href="<?= BASE_URL ?>/"          class="nav-btn" style="padding:0 16px;">Principal</a>
              <a href="<?= BASE_URL ?>/exercicios" class="nav-btn" style="padding:0 16px;">Exercícios</a>
              <a href="<?= BASE_URL ?>/sobre"      class="nav-btn" style="padding:0 16px;">Sobre</a>
            </div>
            <p class="font-urbanist text-sm font-bold tracking-[1.54px] text-white"
               style="text-shadow:0 4px 4px #00000040;">© Architech. Todos os direitos reservados.</p>
          </div>

          <!-- Social -->
          <div class="flex flex-col items-start justify-center gap-2">
            <div class="flex items-center gap-7">
              <a href="#" class="opacity-80 hover:opacity-100 transition-opacity">
                <img class="w-[47px] h-[47px]" src="<?= ASSETS ?>/images/mdi-twitter.svg" alt="Twitter" /></a>
              <a href="#" class="opacity-80 hover:opacity-100 transition-opacity">
                <img class="w-[47px] h-[50px]" src="<?= ASSETS ?>/images/formkit-instagram.svg" alt="Instagram" /></a>
              <a href="#" class="opacity-80 hover:opacity-100 transition-opacity">
                <img class="w-[45px] h-[48px]" src="<?= ASSETS ?>/images/mdi-github.svg" alt="GitHub" /></a>
            </div>
            <p class="font-urbanist text-sm font-bold tracking-[1.54px] text-white"
               style="text-shadow:0 4px 4px #00000040;">Suporte: architech.dev@gmail.com</p>
          </div>

        </div>
      </div>
    </footer>

  </div>
</main>
