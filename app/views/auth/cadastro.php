<section class="page-hero" style="padding:24px 0;">
  <div class="auth-card anim-title" style="max-width:500px;">

    <!-- Logo topo -->
    <div style="display:flex;flex-direction:column;align-items:center;margin-bottom:24px;">
      <img style="width:56px;height:56px;object-fit:cover;" src="<?= ASSETS ?>/images/c244a778-6383-491d-b2f6-58d02d819c9e-1.png" alt="Architech"/>
      <span class="font-pixelify" style="margin-top:6px;font-size:26px;font-weight:600;letter-spacing:4px;color:#fff;text-shadow:-4px 4px 0 rgba(0,0,0,.25);">CADASTRO</span>
    </div>

    <!-- Alertas -->
    <?php if(!empty($error)):   ?>
    <div class="auth-alert auth-alert--error">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
      <?= htmlspecialchars($error) ?>
    </div>
    <?php endif; ?>
    <?php if(!empty($success)): ?>
    <div class="auth-alert auth-alert--success">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
      <?= htmlspecialchars($success) ?>
      <a href="<?= BASE_URL ?>/login" style="color:inherit;font-weight:700;margin-left:6px;">Fazer login →</a>
    </div>
    <?php endif; ?>

    <?php if(empty($success)): ?>
    <!-- Formulário -->
    <form method="POST" action="<?= BASE_URL ?>/cadastro" style="display:flex;flex-direction:column;gap:16px;">

      <!-- Nome -->
      <div class="field-group">
        <label class="field-label">Nome completo <span class="req">*</span></label>
        <div class="field-wrap">
          <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          <input type="text" name="nome" required autocomplete="name"
                 value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>"
                 placeholder="Seu nome completo" class="field-input field-input--icon"/>
        </div>
      </div>

      <!-- E-mail -->
      <div class="field-group">
        <label class="field-label">E-mail <span class="req">*</span></label>
        <div class="field-wrap">
          <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
          <input type="email" name="email" required autocomplete="email"
                 value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                 placeholder="seu@email.com" class="field-input field-input--icon"/>
        </div>
      </div>

      <!-- Nível de conhecimento -->
      <div class="field-group">
        <label class="field-label">Nível de conhecimento</label>
        <div class="field-wrap">
          <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
          <select name="nivel_conhecimento" class="field-input field-input--icon field-select">
            <option value="">Selecione seu nível...</option>
            <?php foreach($niveis as $nv): $sel=($_POST['nivel_conhecimento']??'')===$nv?'selected':''; ?>
            <option value="<?= htmlspecialchars($nv) ?>" <?= $sel ?>><?= htmlspecialchars($nv) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <!-- Senha -->
      <div class="field-group">
        <label class="field-label">Senha <span class="req">*</span></label>
        <div class="field-wrap">
          <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="11" x="3" y="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          <input type="password" name="senha" required autocomplete="new-password"
                 placeholder="Mínimo 6 caracteres" class="field-input field-input--icon"
                 oninput="checkSenha()"/>
        </div>
      </div>

      <!-- Confirmar senha -->
      <div class="field-group">
        <label class="field-label">Confirmar senha <span class="req">*</span></label>
        <div class="field-wrap">
          <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="11" x="3" y="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          <input type="password" name="confirma" required autocomplete="new-password"
                 placeholder="Repita a senha" class="field-input field-input--icon" id="confirma"
                 oninput="checkSenha()"/>
        </div>
        <p id="senha-hint" style="font-size:12px;margin-top:4px;color:rgba(255,255,255,.5);display:none;"></p>
      </div>

      <button type="submit" class="btn-primary" style="border-radius:20px;padding:14px;margin-top:4px;font-size:16px;width:100%;">
        Criar conta
      </button>
    </form>
    <?php endif; ?>

    <!-- Link login -->
    <?php if(empty($success)): ?>
    <div class="auth-divider"><span>ou</span></div>
    <p class="font-urbanist" style="text-align:center;font-size:14px;color:rgba(255,255,255,.7);">
      Já tem conta?
      <a href="<?= BASE_URL ?>/login" style="color:#fff;font-weight:700;text-decoration:underline;margin-left:4px;">Fazer login</a>
    </p>
    <?php endif; ?>

  </div>
</section>

<script>
function checkSenha() {
  var s = document.querySelector('[name="senha"]').value;
  var c = document.getElementById('confirma').value;
  var h = document.getElementById('senha-hint');
  if (!c) { h.style.display='none'; return; }
  h.style.display = 'block';
  if (s === c) { h.textContent = '✓ Senhas coincidem'; h.style.color = 'rgba(134,239,172,.9)'; }
  else         { h.textContent = '✗ Senhas não coincidem'; h.style.color = 'rgba(252,165,165,.9)'; }
}
</script>
