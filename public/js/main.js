/**
 * JavaScript Principal - Interatividade da Architech
 */

// Função para mostrar notificações
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 notification ${type}`;
    notification.textContent = message;
    document.body.appendChild(notification);

    setTimeout(() => {
        notification.remove();
    }, 5000);
}

// Função para validar email
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Função para validar senha
function validatePassword(password) {
    return password.length >= 6;
}

// Função para fazer requisição AJAX
async function makeRequest(url, method = 'GET', data = null) {
    try {
        const options = {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        };

        if (data) {
            options.body = JSON.stringify(data);
        }

        const response = await fetch(url, options);
        return await response.json();
    } catch (error) {
        console.error('Erro na requisição:', error);
        showNotification('Erro ao processar requisição', 'error');
        return null;
    }
}

// Função para animar elementos ao scroll
function observeElements() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, {
        threshold: 0.1
    });

    document.querySelectorAll('[data-animate]').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s ease-out';
        observer.observe(el);
    });
}

// Função para inicializar tooltips
function initTooltips() {
    document.querySelectorAll('[data-tooltip]').forEach(el => {
        el.addEventListener('mouseenter', function() {
            const tooltip = document.createElement('div');
            tooltip.className = 'absolute bg-gray-900 text-white px-3 py-1 rounded text-sm z-50';
            tooltip.textContent = this.getAttribute('data-tooltip');
            this.appendChild(tooltip);

            setTimeout(() => tooltip.remove(), 3000);
        });
    });
}

// Função para validar formulário de login
function validateLoginForm(email, password) {
    if (!email || !password) {
        showNotification('Preencha todos os campos', 'warning');
        return false;
    }

    if (!validateEmail(email)) {
        showNotification('Email inválido', 'warning');
        return false;
    }

    if (!validatePassword(password)) {
        showNotification('Senha deve ter pelo menos 6 caracteres', 'warning');
        return false;
    }

    return true;
}

// Função para validar formulário de registro
function validateRegisterForm(name, email, password, confirmPassword) {
    if (!name || !email || !password || !confirmPassword) {
        showNotification('Preencha todos os campos', 'warning');
        return false;
    }

    if (name.length < 3) {
        showNotification('Nome deve ter pelo menos 3 caracteres', 'warning');
        return false;
    }

    if (!validateEmail(email)) {
        showNotification('Email inválido', 'warning');
        return false;
    }

    if (!validatePassword(password)) {
        showNotification('Senha deve ter pelo menos 6 caracteres', 'warning');
        return false;
    }

    if (password !== confirmPassword) {
        showNotification('As senhas não conferem', 'warning');
        return false;
    }

    return true;
}

// Função para adicionar efeito de ripple aos botões
function addRippleEffect() {
    document.querySelectorAll('button, a[role="button"]').forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.className = 'ripple';

            this.appendChild(ripple);

            setTimeout(() => ripple.remove(), 600);
        });
    });
}

// Função para inicializar o tema
function initTheme() {
    const theme = localStorage.getItem('theme') || 'dark';
    document.documentElement.setAttribute('data-theme', theme);
}

// Função para alternar tema
function toggleTheme() {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
}

// Função para debounce
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Função para throttle
function throttle(func, limit) {
    let inThrottle;
    return function(...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Inicializar quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', function() {
    console.log('Architech - Aplicação iniciada');
    
    initTheme();
    observeElements();
    initTooltips();
    addRippleEffect();

    // Event listeners globais
    document.addEventListener('keydown', function(e) {
        // Atalho: ESC para fechar modais
        if (e.key === 'Escape') {
            document.querySelectorAll('[data-modal].active').forEach(modal => {
                modal.classList.remove('active');
            });
        }
    });
});

// Prevenir comportamentos padrão em links de placeholder
document.addEventListener('click', function(e) {
    if (e.target.getAttribute('data-placeholder') === 'true') {
        e.preventDefault();
        showNotification('Esta funcionalidade em breve!', 'info');
    }
});

// Exportar funções para uso global
window.Architech = {
    showNotification,
    validateEmail,
    validatePassword,
    makeRequest,
    validateLoginForm,
    validateRegisterForm,
    toggleTheme
};
