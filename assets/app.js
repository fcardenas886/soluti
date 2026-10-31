// Animaciones de la página. Si el visitante pidió "reducir movimiento" en su sistema, se muestran estáticas.
(function () {
    const quieto = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // Titular: la última palabra se escribe, se borra y cambia por la siguiente
    const rota = document.querySelector('.rota');
    if (rota && !quieto) {
        const palabras = JSON.parse(rota.dataset.palabras || '[]');
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

    // Aparición al hacer scroll, escalonada dentro de cada grupo
    const aparecer = document.querySelectorAll('.sec h2, .sec .sub, .card, .stats > div, .about > div, .cta .actions');
    aparecer.forEach(el => {
        el.classList.add('reveal');
        const hermanos = [...el.parentElement.children].filter(h => h.classList.contains('card') || h.parentElement.classList.contains('stats'));
        const n = hermanos.indexOf(el);
        if (n > 0) el.style.transitionDelay = (n % 3) * 120 + 'ms';
    });

    // Contadores de la portada: "15+" cuenta de 0 a 15. Los que no son un número simple (ej. "24/7") quedan igual.
    const contar = el => {
        const m = el.dataset.contar.match(/^(\d+)(\D*)$/);
        if (!m || quieto) return;
        const fin = +m[1], sufijo = m[2], t0 = performance.now(), dur = 1400;
        const tick = t => {
            const p = Math.min((t - t0) / dur, 1);
            el.textContent = Math.round(fin * (1 - Math.pow(1 - p, 3))) + sufijo;
            if (p < 1) requestAnimationFrame(tick);
        };
        requestAnimationFrame(tick);
    };

    if ('IntersectionObserver' in window) {
        const obs = new IntersectionObserver(entradas => entradas.forEach(en => {
            if (!en.isIntersecting) return;
            en.target.classList.add('visible');
            // Quita el retraso una vez que apareció, para que el hover responda al instante
            setTimeout(() => { en.target.style.transitionDelay = ''; en.target.style.transition = 'transform .25s, border-color .2s, box-shadow .25s'; }, 1200);
            en.target.querySelectorAll('[data-contar]').forEach(contar);
            obs.unobserve(en.target);
        }), { threshold: 0.15 });
        aparecer.forEach(el => obs.observe(el));
    } else {
        aparecer.forEach(el => el.classList.add('visible'));
    }

    // Luz que sigue al mouse sobre las tarjetas
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('mousemove', ev => {
            const r = card.getBoundingClientRect();
            card.style.setProperty('--mx', (ev.clientX - r.left) + 'px');
            card.style.setProperty('--my', (ev.clientY - r.top) + 'px');
        });
    });

    // Menú con sombra al bajar
    const nav = document.querySelector('.nav');
    const alBajar = () => nav.classList.toggle('scrolled', window.scrollY > 20);
    window.addEventListener('scroll', alBajar, { passive: true });
    alBajar();
})();
