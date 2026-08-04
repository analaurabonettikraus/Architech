<?php
$sidebarItems = [
  ['label'=>'Perfil',        'icon'=>'ix-user-profile-filled.svg',                        'link'=>'login'],
  ['label'=>'Meus projetos', 'icon'=>'solar-folder-with-files-bold.svg',                  'link'=>'projetos'],
  ['label'=>'Vídeoaulas',    'icon'=>'tabler-book-filled.svg',                             'link'=>'videoaulas'],
  ['label'=>'Nossa IA',      'icon'=>'streamline-artificial-intelligence-spark-solid.svg', 'link'=>'ia'],
  ['label'=>'Fórum',         'icon'=>'healthicons-group-discussion-meetingx3.svg',         'link'=>'forum'],
];
$animCls = ['anim-nav-item-1','anim-nav-item-2','anim-nav-item-3','anim-nav-item-4','anim-nav-item-5'];
?>
<aside class="sidebar-fixed anim-sidebar">
  <div class="card-glass" style="border-radius:38px;">
    <div style="display:flex;flex-direction:column;align-items:center;padding:16px 16px 24px;">
      <a href="<?= BASE_URL ?>/" style="text-decoration:none;display:flex;flex-direction:column;align-items:center;margin-bottom:20px;">
        <img style="width:48px;height:48px;object-fit:cover;" src="<?= ASSETS ?>/images/c244a778-6383-491d-b2f6-58d02d819c9e-1.png" alt="Architech"/>
        <span class="font-pixelify" style="margin-top:4px;font-size:11px;font-weight:600;letter-spacing:1.21px;color:#fff;white-space:nowrap;text-shadow:0 4px 4px #00000040;">ARCHITECH</span>
      </a>
      <nav style="width:100%;">
        <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:12px;">
          <?php foreach($sidebarItems as $i=>$item): $active=isset($activePage)&&$activePage===$item['link']; ?>
          <li class="<?= $animCls[$i] ?>">
            <a href="<?= BASE_URL.'/'.$item['link'] ?>" class="sidebar-btn<?= $active?' active':'' ?>">
              <img src="<?= ASSETS ?>/images/<?= $item['icon'] ?>" alt="<?= htmlspecialchars($item['label']) ?>"/>
              <span><?= htmlspecialchars($item['label']) ?></span>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </nav>
      <?php if(isset($_SESSION['usuario_id'])): ?>
      <div style="margin-top:16px;width:100%;border-top:1px solid rgba(255,255,255,.12);padding-top:14px;">
        <p class="font-urbanist" style="font-size:12px;color:rgba(255,255,255,.6);text-align:center;margin-bottom:8px;">
          Olá, <?= htmlspecialchars($_SESSION['usuario_nome'] ?? '') ?>
        </p>
        <a href="<?= BASE_URL ?>/logout" class="sidebar-btn" style="justify-content:center;background:rgba(220,38,38,.18);">
          <span>Sair</span>
        </a>
      </div>
      <?php endif; ?>
    </div>
  </div>
</aside>
