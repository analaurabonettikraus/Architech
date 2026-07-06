<?php
$sidebarItems = [
  ['label'=>'Perfil',        'icon'=>'ix-user-profile-filled.svg',                        'link'=>'login'],
  ['label'=>'Meus projetos', 'icon'=>'solar-folder-with-files-bold.svg',                  'link'=>'projetos'],
  ['label'=>'Vídeoaulas',    'icon'=>'tabler-book-filled.svg',                             'link'=>'videoaulas'],
  ['label'=>'Nossa IA',      'icon'=>'streamline-artificial-intelligence-spark-solid.svg', 'link'=>'ia'],
  ['label'=>'Fórum',         'icon'=>'healthicons-group-discussion-meetingx3.svg',         'link'=>'forum'],
];
?>
<aside class="w-full max-w-[172px] shrink-0">
  <div class="card-glass min-h-[393px] rounded-[38px]">
    <div class="flex h-full flex-col items-center px-4 pb-6 pt-4">
      <div class="mb-4 flex flex-col items-center">
        <img class="h-12 w-12 object-cover" alt="Architech" src="<?= ASSETS ?>/images/c244a778-6383-491d-b2f6-58d02d819c9e-1.png" />
        <span class="mt-1 font-pixelify text-[11px] font-semibold tracking-[1.21px] text-white whitespace-nowrap" style="text-shadow:0 4px 4px #00000040;">ARCHITECH</span>
      </div>
      <nav class="w-full"><ul class="flex flex-col gap-[15px]">
        <?php foreach ($sidebarItems as $item): ?>
        <li><a href="<?= BASE_URL . '/' . $item['link'] ?>"
          class="sidebar-btn flex items-center gap-3 w-full rounded-[32px] px-[14px] py-[10px] <?= ($activePage === $item['link']) ? 'active' : '' ?>">
          <img class="w-[30px] h-[30px] shrink-0" alt="" src="<?= ASSETS ?>/images/<?= $item['icon'] ?>" />
          <span class="font-urbanist text-2xl font-bold text-white" style="text-shadow:0 4px 4px #00000040;"><?= htmlspecialchars($item['label']) ?></span>
        </a></li>
        <?php endforeach; ?>
      </ul></nav>
    </div>
  </div>
</aside>
