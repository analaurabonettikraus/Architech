# Architech - Landing Page com PHP MVC

Landing page da plataforma Architech desenvolvida com **PHP, HTML, CSS, JavaScript e Tailwind CSS** em arquitetura **MVC**.

## 📋 Requisitos

- PHP 7.4+
- MySQL 5.7+
- Apache com mod_rewrite habilitado
- Composer (opcional, para gerenciamento de dependências)

## 🚀 Instalação

### 1. Clonar ou Copiar o Projeto

```bash
cd /home/ubuntu/architech-php
```

### 2. Configurar Banco de Dados

O projeto já está configurado para usar:
- **Host**: localhost
- **User**: root
- **Password**: aninha10
- **Database**: architech

Se precisar alterar as credenciais, edite o arquivo `config/database.php`.

### 3. Iniciar o Servidor PHP

```bash
php -S localhost:8000
```

Ou use Apache/Nginx conforme sua configuração.

### 4. Acessar a Aplicação

Abra seu navegador e acesse:
```
http://localhost:8000
```

## 📁 Estrutura do Projeto

```
architech-php/
├── app/
│   ├── controllers/      # Controladores (lógica de negócio)
│   ├── models/           # Modelos (interação com banco de dados)
│   └── views/            # Templates HTML
├── config/               # Arquivos de configuração
├── public/               # Arquivos públicos (CSS, JS, assets)
│   ├── css/
│   ├── js/
│   └── assets/           # Imagens e ícones
├── routes/               # Definição de rotas
├── index.php             # Ponto de entrada da aplicação
├── .htaccess             # Configuração Apache
└── README.md             # Este arquivo
```

## 🔑 Funcionalidades

### Públicas
- ✅ Landing page com design pixel-perfect do Figma
- ✅ Página de login
- ✅ Página de cadastro
- ✅ Navegação responsiva

### Autenticadas (após login)
- ✅ Dashboard do usuário
- ✅ Perfil do usuário
- ✅ Seção de exercícios
- ✅ Seção de projetos
- ✅ Vídeoaulas
- ✅ Nossa IA
- ✅ Fórum

## 🔐 Segurança

- ✅ Senhas com hash bcrypt
- ✅ Proteção contra SQL Injection (PDO prepared statements)
- ✅ Validação de entrada
- ✅ Sessões seguras
- ✅ Headers de segurança HTTP

## 🎨 Design

- **Framework CSS**: Tailwind CSS
- **Fontes**: Pixelify Sans, Urbanist
- **Tema**: Cyber-estética retro-futurista
- **Animações**: Flutuação, transições suaves
- **Responsividade**: Mobile-first

## 📝 Rotas Disponíveis

| Rota | Método | Descrição |
|------|--------|-----------|
| `/` | GET | Landing page |
| `/login` | GET/POST | Página de login |
| `/register` | GET/POST | Página de cadastro |
| `/logout` | GET | Fazer logout |
| `/dashboard` | GET | Dashboard (autenticado) |
| `/profile` | GET | Perfil do usuário (autenticado) |
| `/exercises` | GET | Exercícios |
| `/about` | GET | Sobre |
| `/forum` | GET | Fórum |
| `/ai` | GET | Nossa IA |

## 🛠️ Desenvolvimento

### Adicionar Nova Rota

1. Criar método no controller apropriado em `app/controllers/`
2. Adicionar a rota em `routes/web.php`
3. Criar a view em `app/views/`

### Adicionar Nova Model

1. Criar arquivo em `app/models/`
2. Estender a classe com métodos de banco de dados
3. Usar em controllers via `require_once`

### Customizar Estilos

- Editar `public/css/style.css` para CSS customizado
- Usar classes Tailwind nos templates HTML
- Adicionar animações em `public/css/style.css`

## 🐛 Troubleshooting

### Erro de conexão com banco de dados
- Verifique se MySQL está rodando
- Confirme as credenciais em `config/database.php`
- Crie o banco de dados `architech` se não existir

### Rotas não funcionam
- Verifique se mod_rewrite está habilitado no Apache
- Confirme que `.htaccess` está na raiz do projeto
- Teste com `http://localhost:8000/index.php/rota`

### Sessões não persistem
- Verifique as permissões de pasta `/tmp` (Linux)
- Confirme que `session_start()` é chamado em `config/config.php`

## 📚 Referências

- [PHP Documentation](https://www.php.net/docs.php)
- [Tailwind CSS](https://tailwindcss.com/)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [MDN Web Docs](https://developer.mozilla.org/)

## 📄 Licença

Este projeto é fornecido como está para fins educacionais.

## 👨‍💻 Autor

Desenvolvido como parte do projeto Architech.

---

**Última atualização**: Junho 2026
