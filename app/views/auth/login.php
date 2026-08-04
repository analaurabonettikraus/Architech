<section class="page-hero">
  <div class="auth-card anim-title">

    <!-- Logo topo -->
    <div style="display:flex;flex-direction:column;align-items:center;margin-bottom:28px;">
      <img style="width:64px;height:64px;object-fit:cover;" src="<?= ASSETS ?>/images/c244a778-6383-491d-b2f6-58d02d819c9e-1.png" alt="Architech"/>
      <span class="font-pixelify" style="margin-top:6px;font-size:28px;font-weight:600;letter-spacing:4px;color:#fff;text-shadow:-4px 4px 0 rgba(0,0,0,.25);">LOGIN</span>
    </div>

    <!-- Alerta de erro -->
    <?php if(!empty($error)): ?>
    <div class="auth-alert auth-alert--error">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
      <?= htmlspecialchars($error) ?>
    </div>
    <?php endif; ?>

    <!-- Formulário -->
    <form method="POST" action="<?= BASE_URL ?>/login" style="display:flex;flex-direction:column;gap:18px;">
      <div class="field-group">
        <label class="field-label">E-mail</label>
        <div class="field-wrap">
          <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
          <input type="email" name="email" required autocomplete="email"
                 value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                 placeholder="seu@email.com" class="field-input field-input--icon"/>
        </div>
      </div>

      <div class="field-group">
        <label class="field-label">Senha</label>
        <div class="field-wrap">
          <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="11" x="3" y="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          <input type="password" name="senha" required autocomplete="current-password"
                 placeholder="Sua senha" class="field-input field-input--icon"/>
        </div>
      </div>

      <button type="submit" class="btn-primary" style="border-radius:20px;padding:14px;margin-top:4px;font-size:16px;width:100%;">
        Entrar
      </button>
    </form>

    <!-- Divider -->
    <div class="auth-divider"><span>ou</span></div>

    <!-- Link cadastro -->
    <p class="font-urbanist" style="text-align:center;font-size:14px;color:rgba(255,255,255,.7);">
      Não tem conta?
      <a href="<?= BASE_URL ?>/cadastro" style="color:#fff;font-weight:700;text-decoration:underline;margin-left:4px;">Cadastre-se grátis</a>
    </p>

  </div>
</section>
