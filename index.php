<?php
$c = require __DIR__ . '/config.php';

function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

$ct = $c['contacto'];
$wa = $ct['whatsapp'] ? 'https://wa.me/' . preg_replace('/\D/', '', $ct['whatsapp']) . '?text=' . rawurlencode('Hola ' . $c['nombre'] . ', vi su página y me interesa un sistema.') : '';
$marca = str_ends_with($c['nombre'], 'TI')
    ? '<span class="ti">' . e(substr($c['nombre'], 0, 1)) . '</span>' . e(substr($c['nombre'], 1, -2)) . '<span class="ti">TI</span>'
    : e($c['nombre']);
$copihue ='<img src="assets/copihue.svg" alt="Copihue" class="copihue">';
$lugar = e($c['ciudad']) . ' ' . $copihue . ' <span class="reg">' . e($c['region']) . '</span>';
$ctaUrl = $wa ?: 'mailto:' . $ct['email'];
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($c['nombre']) ?> · <?= e($c['significado']) ?> · <?= e($c['ciudad']) ?></title>
    <link rel="icon" href="assets/copihue.svg">
    <meta name="description" content="<?= e($c['eslogan']) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css?v=<?= filemtime(__DIR__ . '/assets/style.css') ?>">
    <script>document.documentElement.classList.add('js');</script>
    <script src="assets/app.js?v=<?= filemtime(__DIR__ . '/assets/app.js') ?>" defer></script>
</head>
<body>

<header class="nav">
    <div class="wrap nav-in">
        <a href="#inicio" class="logo">
            <span class="logo-mark"><?= $marca ?></span>
            <small><?= e($c['significado']) ?></small>
        </a>
        <nav>
            <a href="#servicios">Servicios</a>
            <a href="#soluciones">Soluciones</a>
            <a href="#sobre-mi">Nosotros</a>
            <a href="#contacto" class="btn btn-sm">Contáctanos</a>
        </nav>
    </div>
</header>

<section id="inicio" class="hero">
    <div class="blobs" aria-hidden="true"><span></span><span></span><span></span></div>
    <div class="wrap hero-in">
        <div class="hero-text">
            <p class="kicker"><?= e($c['titulo']) ?></p>
            <p class="place"><?= $lugar ?></p>
            <h1><?= $marca ?><span class="acro"><?= e($c['significado']) ?></span><br><span class="grad"><?= e($c['titular']) ?>
                <span class="rota" data-palabras="<?= e(json_encode($c['titular_palabras'], JSON_UNESCAPED_UNICODE)) ?>"><?= e($c['titular_palabras'][0]) ?></span></span></h1>
            <p class="lead"><?= e($c['eslogan']) ?></p>
            <div class="actions">
                <a href="<?= e($ctaUrl) ?>" class="btn" target="_blank" rel="noopener">Cotiza tu proyecto</a>
                <a href="#soluciones" class="btn btn-ghost">Ver soluciones</a>
            </div>
        </div>
        <div class="avatar">
            <?php if ($c['foto']): ?>
                <img src="<?= e($c['foto']) ?>" alt="<?= e($c['nombre']) ?>">
            <?php else: ?>
                <span><?= $marca ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="wrap stats">
        <?php foreach ($c['stats'] as $s): ?>
            <div><strong data-contar="<?= e($s['numero']) ?>"><?= e($s['numero']) ?></strong><span><?= e($s['texto']) ?></span></div>
        <?php endforeach; ?>
    </div>
</section>

<section id="servicios" class="sec">
    <div class="wrap">
        <h2>¿En qué te puedo ayudar?</h2>
        <p class="sub">Soluciones listas para usar o construidas desde cero según tu necesidad.</p>
        <div class="grid">
            <?php foreach ($c['servicios'] as $s): ?>
                <article class="card<?= !empty($s['destacado']) ? ' destacado' : '' ?>">
                    <div class="ico"><?= $s['icono'] ?></div>
                    <h3><?= e($s['titulo']) ?></h3>
                    <p><?= e($s['texto']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="soluciones" class="sec alt">
    <div class="wrap">
        <h2>¿Te suena familiar?</h2>
        <p class="sub">Problemas reales de negocios reales, y cómo los resolvemos.</p>
        <div class="grid">
            <?php foreach ($c['soluciones'] as $s):
                $msg = 'Hola, vi su página y me interesa: ' . $s['titulo'];
                $link = $ct['whatsapp']
                    ? 'https://wa.me/' . preg_replace('/\D/', '', $ct['whatsapp']) . '?text=' . rawurlencode($msg)
                    : 'mailto:' . $ct['email'] . '?subject=' . rawurlencode($msg);
            ?>
                <article class="card sol">
                    <div class="ico"><?= $s['icono'] ?></div>
                    <p class="problema"><?= e($s['problema']) ?></p>
                    <h3><?= e($s['titulo']) ?></h3>
                    <p><?= e($s['texto']) ?></p>
                    <ul class="puntos">
                        <?php foreach ($s['puntos'] as $pt): ?><li><?= e($pt) ?></li><?php endforeach; ?>
                    </ul>
                    <a href="<?= e($link) ?>" target="_blank" rel="noopener" class="more">Conversemos →</a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="sobre-mi" class="sec">
    <div class="wrap about">
        <div>
            <h2>Sobre <?= e($c['nombre']) ?></h2>
            <p class="lead"><?= e($c['sobre_mi']) ?></p>
            <div class="zona">
                <p class="place"><?= $lugar ?></p>
                <p><?= e($c['cobertura']) ?></p>
            </div>
        </div>
        <div>
            <h3>Tecnologías</h3>
            <div class="tags big">
                <?php foreach ($c['tecnologias'] as $t): ?><span><?= e($t) ?></span><?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section id="contacto" class="sec cta">
    <div class="wrap">
        <h2>¿Tienes un proyecto en mente?</h2>
        <p class="sub">Cuéntanos qué necesitas y te respondemos con una propuesta sin compromiso.</p>
        <div class="actions center">
            <?php if ($wa): ?><a href="<?= e($wa) ?>" class="btn" target="_blank" rel="noopener">💬 WhatsApp</a><?php endif; ?>
            <a href="mailto:<?= e($ct['email']) ?>" class="btn <?= $wa ? 'btn-ghost' : '' ?>">✉️ <?= e($ct['email']) ?></a>
            <?php if ($ct['linkedin']): ?><a href="<?= e($ct['linkedin']) ?>" class="btn btn-ghost" target="_blank" rel="noopener">LinkedIn</a><?php endif; ?>
            <?php if ($ct['github']): ?><a href="<?= e($ct['github']) ?>" class="btn btn-ghost" target="_blank" rel="noopener">GitHub</a><?php endif; ?>
        </div>
    </div>
</section>

<footer class="foot">
    <div class="wrap">
        <p class="foot-brand"><strong><?= e($c['nombre']) ?></strong> · <?= e($c['significado']) ?></p>
        <p class="place">Hecho con orgullo en <?= $lugar ?>, Chile</p>
        <p class="copy">© <?= date('Y') ?> <?= e($c['nombre']) ?>. Todos los derechos reservados.</p>
    </div>
</footer>

<?php if ($wa): ?>
<a href="<?= e($wa) ?>" class="wa-float" target="_blank" rel="noopener" aria-label="WhatsApp">💬</a>
<?php endif; ?>

</body>
</html>
