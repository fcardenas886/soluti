// Comportamiento de la página: contacto (WhatsApp o correo), titular animado, menú móvil y aparición al hacer scroll.
(function () {
    const quieto = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const { email, whatsapp } = document.body.dataset;

    // Contacto: con número de WhatsApp los botones abren el chat; sin él, abren el correo con el asunto ya escrito
    if (whatsapp) document.documentElement.classList.add('wa');
    document.querySelectorAll('[data-msg]').forEach(a => {
        const msg = encodeURIComponent(a.dataset.msg);
        if (whatsapp) {
            a.href = `https://wa.me/${whatsapp}?text=${msg}`;
            a.target = '_blank';
            a.rel = 'noopener';
            a.hidden = false;
        } else if (!a.hidden) {
            a.href = `mailto:${email}?subject=${msg}`;
        }
    });
    document.querySelectorAll('[data-mail]').forEach(a => {
        a.href = `mailto:${email}?subject=${encodeURIComponent(a.dataset.mail)}`;
    });

    // Titular: la última palabra se escribe, se borra y cambia por la siguiente.
    // Su caja toma el ancho de la palabra más larga, para que el texto no salte al cambiar.
    const rota = document.querySelector('.rota');
    if (rota) {
        const palabras = JSON.parse(rota.dataset.palabras || '[]');
        const medir = () => {
            const actual = rota.textContent;
            rota.parentElement.style.minWidth = '';
            const ancho = Math.max(...palabras.map(p => { rota.textContent = p; return rota.offsetWidth; }));
            rota.textContent = actual;
            rota.parentElement.style.minWidth = ancho + 'px';
        };
        (document.fonts ? document.fonts.ready : Promise.resolve()).then(medir);
        window.addEventListener('resize', medir);

        if (!quieto) {
            let i = 0, letras = palabras[0].length, borrando = true;
            const paso = () => {
                if (borrando) {
                    letras--;
                    if (letras === 0) { borrando = false; i = (i + 1) % palabras.length; }
                } else {
                    letras++;
                    if (letras === palabras[i].length) { borrando = true; rota.textContent = palabras[i]; return setTimeout(paso, 2200); }
                }
                rota.textContent = palabras[i].slice(0, letras) || '​';
                setTimeout(paso, borrando ? 45 : 90);
            };
            setTimeout(paso, 2500);
        }
    }

    // Menú móvil
    const nav = document.querySelector('.nav');
    const boton = nav.querySelector('.menu-btn');
    const abrir = si => {
        nav.classList.toggle('open', si);
        boton.setAttribute('aria-expanded', si);
        boton.setAttribute('aria-label', si ? 'Cerrar menú' : 'Abrir menú');
    };
    boton.addEventListener('click', () => abrir(!nav.classList.contains('open')));
    nav.querySelectorAll('nav a').forEach(a => a.addEventListener('click', () => abrir(false)));
    document.addEventListener('keydown', ev => { if (ev.key === 'Escape') abrir(false); });

    // Menú con sombra al bajar
    const alBajar = () => nav.classList.toggle('scrolled', window.scrollY > 20);
    window.addEventListener('scroll', alBajar, { passive: true });
    alBajar();

    // Aparición al hacer scroll, escalonada dentro de cada grupo
    if (quieto || !('IntersectionObserver' in window)) return;
    const aparecer = document.querySelectorAll('.sec-head, .prod-text, .prod-visual, .serv, .steps li, .faq details, .about > div, .cta');
    aparecer.forEach(el => {
        el.classList.add('reveal');
        const n = [...el.parentElement.children].indexOf(el);
        if (el.matches('.serv, .steps li, .faq details') && n > 0) el.style.transitionDelay = (n % 4) * 80 + 'ms';
    });
    const obs = new IntersectionObserver(entradas => entradas.forEach(en => {
        if (!en.isIntersecting) return;
        en.target.classList.add('visible');
        // Quita el retraso una vez que apareció, para que el hover responda al instante
        setTimeout(() => { en.target.style.transitionDelay = ''; }, 900);
        obs.unobserve(en.target);
    }), { rootMargin: '0px 0px -6% 0px' });
    aparecer.forEach(el => obs.observe(el));
})();
