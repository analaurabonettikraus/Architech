# 📸 Guia de Colocação de Imagens

Este documento explica onde colocar cada imagem/ícone do Figma no projeto.

## 📁 Estrutura de Pastas

Todas as imagens devem ser colocadas em:
```
architech-php/
└── public/
    └── assets/
        ├── 5-14.svg          ← Tech Element (elemento decorativo)
        ├── 7-3.svg           ← CSS3 Logo
        ├── 8-5.svg           ← JavaScript Logo
        ├── 8-7.svg           ← JavaScript Background
        ├── 8-11.svg          ← HTML5 Logo
        ├── 8-19.svg          ← Ícone de Perfil (sidebar)
        ├── 8-24.svg          ← Ícone de Projetos (sidebar)
        ├── 8-29.svg          ← Ícone de Videoaulas (sidebar)
        ├── 16-12.svg         ← Ícone de IA (sidebar)
        ├── 16-23.svg         ← Ícone de Fórum (sidebar)
        ├── 23-38.svg         ← Ícone do GitHub (footer)
        ├── 28-112.svg        ← Ícone do Instagram (footer)
        ├── 28-116.svg        ← Ícone do Twitter (footer)
        ├── 232-1266.svg      ← Ícone adicional
        ├── 232-1447.svg      ← Ícone de Usuário (header)
        ├── 53-81.webp        ← Logo 3D Architech (footer)
        └── 53-89.webp        ← Logo Architech (sidebar)
```

## 🎨 Descrição de Cada Imagem

| Arquivo | Localização | Descrição | Tamanho Recomendado |
|---------|-------------|-----------|-------------------|
| **5-14.svg** | Elemento flutuante central | Tech Element - Elemento decorativo orbitando | 131x141px |
| **7-3.svg** | Elemento flutuante superior direito | CSS3 Logo - Ícone de CSS | 68x75px |
| **8-5.svg** | Elemento flutuante inferior direito | JavaScript Logo - Ícone de JS | 97x97px |
| **8-7.svg** | Elemento flutuante inferior direito | JavaScript Background - Fundo do JS | 97x97px |
| **8-11.svg** | Elemento flutuante superior direito | HTML5 Logo - Ícone de HTML | 87x91px |
| **8-19.svg** | Sidebar - Menu lateral | Ícone de Perfil | 21x21px |
| **8-24.svg** | Sidebar - Menu lateral | Ícone de Projetos | 21x21px |
| **8-29.svg** | Sidebar - Menu lateral | Ícone de Videoaulas | 21x17px |
| **16-12.svg** | Sidebar - Menu lateral | Ícone de IA | 24x23px |
| **16-23.svg** | Sidebar - Menu lateral | Ícone de Fórum | 18x18px |
| **23-38.svg** | Footer - Rodapé | Ícone do GitHub | 24x24px |
| **28-112.svg** | Footer - Rodapé | Ícone do Instagram | 24x24px |
| **28-116.svg** | Footer - Rodapé | Ícone do Twitter | 24x24px |
| **232-1266.svg** | Não utilizado atualmente | Ícone adicional | - |
| **232-1447.svg** | Header - Barra superior | Ícone de Usuário/Login | 20x20px |
| **53-81.webp** | Footer - Rodapé | Logo 3D Architech (grande) | 155x155px |
| **53-89.webp** | Sidebar - Menu lateral | Logo Architech (pequeno) | 56x56px |

## 🔍 Como Adicionar Imagens

### Passo 1: Exportar do Figma
1. Abra o Figma
2. Selecione o elemento
3. Clique em "Export" (canto inferior direito)
4. Escolha o formato (SVG para ícones, WEBP para logos)
5. Clique em "Export"

### Passo 2: Copiar para a Pasta
1. Copie o arquivo exportado
2. Cole em `architech-php/public/assets/`
3. Renomeie com o nome correto (ex: `5-14.svg`)

### Passo 3: Verificar no Navegador
1. Abra `http://localhost:8000`
2. Verifique se todas as imagens aparecem corretamente
3. Se alguma não aparecer, verifique o caminho em `app/views/home/index.php`

## 🎯 Elementos Decorativos Orbitais

Esses elementos flutuam na página:

```
Tech Element (5-14.svg)
├─ Posição: Centro-superior
├─ Animação: Flutuação suave
└─ Opacidade: 90%

CSS3 (7-3.svg)
├─ Posição: Superior direito
├─ Animação: Flutuação com rotação
└─ Opacidade: 40%

JavaScript (8-5.svg + 8-7.svg)
├─ Posição: Inferior direito
├─ Animação: Flutuação com rotação
└─ Opacidade: 75%

HTML5 (8-11.svg)
├─ Posição: Superior direito
├─ Animação: Flutuação com rotação
└─ Opacidade: 75%
```

## 📝 Notas Importantes

- **Formatos**: Use SVG para ícones (escalável) e WEBP para fotos/logos (melhor compressão)
- **Tamanhos**: Os tamanhos recomendados são aproximados, ajuste conforme necessário
- **Sombras**: As sombras são aplicadas via CSS, não precisam estar na imagem
- **Cores**: Mantenha as cores originais do Figma para consistência

## 🐛 Troubleshooting

### Imagens não aparecem
1. Verifique se o arquivo está em `public/assets/`
2. Verifique o nome do arquivo (case-sensitive)
3. Abra o console do navegador (F12) e procure por erros 404

### Imagens aparecem distorcidas
1. Verifique o tamanho do arquivo
2. Exporte novamente do Figma com melhor qualidade
3. Ajuste o tamanho em `app/views/home/index.php`

### Imagens não carregam em produção
1. Verifique se os arquivos foram incluídos no ZIP
2. Verifique as permissões de pasta
3. Verifique o caminho da URL (`APP_URL`)

---

**Última atualização**: Junho 2026
