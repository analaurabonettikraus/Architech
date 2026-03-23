# Architech — Estrutura do Projeto

## 📁 Estrutura de Pastas

```
architech/
├── template.html              ← Base para criar novas páginas
├── cadastro.html              ← Exemplo: página de cadastro
├── login.html                 ← (você cria, copiando o template)
├── dashboard.html             ← (você cria, copiando o template)
│
└── assets/
    ├── css/
    │   ├── background.css     ← 🔁 Background reutilizável (NUNCA EDITE)
    │   └── cadastro.css       ← CSS específico da página de cadastro
    │
    ├── js/
    │   └── (seus scripts aqui)
    │
    └── images/
        └── logo.png           ← Coloque o logo real aqui
```

---

## 🚀 Como criar uma nova página

1. **Copie o `template.html`** e renomeie para o nome da sua página:
   ```
   template.html  →  login.html
   template.html  →  dashboard.html
   ```

2. **Crie um CSS específico** para a página em `assets/css/`:
   ```
   assets/css/login.css
   assets/css/dashboard.css
   ```

3. **No HTML copiado**, adicione o link do CSS específico:
   ```html
   <!-- 1. Background (sempre inclua) -->
   <link rel="stylesheet" href="assets/css/background.css" />

   <!-- 2. CSS da sua página -->
   <link rel="stylesheet" href="assets/css/login.css" />
   ```

4. **Cole seu conteúdo** dentro de `<div class="page-content">`.

---

## 🎨 Classes do Background

| Classe            | O que faz                              |
|-------------------|----------------------------------------|
| `.architech-bg`   | Wrapper principal com gradiente        |
| `.bg-icons`       | Contém os ícones flutuantes decorativos|
| `.page-content`   | Seu conteúdo vai aqui (z-index correto)|
| `.btn-back`       | Botão "Voltar para principal"          |

---

## 🌈 Variáveis CSS disponíveis (background.css)

```css
--bg-top, --bg-mid, --bg-bottom   /* Cores do gradiente */
--font-display                     /* Rajdhani (títulos) */
--font-body                        /* Exo 2 (textos)    */
--text-light                       /* #ffffff            */
--text-muted                       /* rgba branco 70%   */
```
