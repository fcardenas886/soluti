<?php
// ============================================================
//  EDITA AQUÍ TUS DATOS. Todo el sitio se genera desde este archivo.
// ============================================================

return [
    'nombre'    => 'SoluTI', // si termina en "TI", la primera letra y "TI" se destacan en color
    'significado' => 'Soluciones Tecnológicas Integrales',
    'titulo'    => 'Desarrollo de Software a Medida',
    'titular'   => 'Tecnología a la medida de tu',
    // La última palabra del titular va cambiando con efecto de escritura (la primera se muestra si no hay JavaScript)
    'titular_palabras' => ['negocio', 'minimarket', 'taller', 'almacén', 'botillería', 'pyme'],
    'eslogan'   => 'Desarrollamos sistemas de ventas e inventario para pymes. '
        . '¿Necesitas algo más? Lo conversamos y te entregamos una propuesta integral.',
    'foto'      => '', // ej: 'assets/logo.png' (déjalo vacío para mostrar el nombre)

    'ciudad'    => 'Loncoche',
    'region'    => 'Región de La Araucanía',
    'cobertura' => 'Atención presencial en Loncoche, Lanco, Villarrica, Pucón y Temuco. Soporte remoto a todo Chile.',

    'contacto' => [
        'email'     => 'alek886.inf@gmail.com',
        'whatsapp'  => '', // solo números con código de país, ej: '56912345678'
        'linkedin'  => '', // URL completa
        'github'    => '', // URL completa
    ],

    'sobre_mi' => 'SoluTI nace en Loncoche con una idea simple: que las pymes del sur de Chile tengan la misma tecnología '
        . 'que las grandes empresas. Desarrollamos sistemas de punto de venta, control de stock, boleta electrónica '
        . 'integrada con el SII y aplicaciones de gestión que funcionan en computador, tablet y celular.',

    'stats' => [
        ['numero' => '15+', 'texto' => 'Sistemas desarrollados'],
        ['numero' => '100%', 'texto' => 'A medida de cada cliente'],
        ['numero' => '24/7', 'texto' => 'Sistemas en la nube o local'],
    ],

    'servicios' => [
        ['icono' => '🛒', 'titulo' => 'Punto de venta (POS)', 'texto' => 'Cajas rápidas para minimarkets, botillerías y comercios: lector de código de barras, turnos, cierre de caja y venta incluso sin internet.'],
        ['icono' => '📦', 'titulo' => 'Control de inventario', 'texto' => 'Stock en tiempo real, kardex, alertas de quiebre, compras a proveedores y reportes para decidir mejor.'],
        ['icono' => '📲', 'titulo' => 'SimpleStock: toma de inventario', 'texto' => 'App para Android que convierte tu celular en escáner: cuenta tu stock en bodega o sala y exporta en CSV para cargarlo en otros sistemas del mercado.'],
        ['icono' => '🔧', 'titulo' => 'POS para taller mecánico', 'texto' => 'Órdenes de trabajo de principio a fin: recepción, diagnóstico, presupuesto, reparación y entrega. Ficha del vehículo, venta de repuestos y avisos por WhatsApp.'],
        ['icono' => '🧾', 'titulo' => 'Boleta electrónica SII integrada', 'texto' => 'Emite boletas electrónicas directo al SII desde tu propio sistema, sin plataformas de terceros. Timbre electrónico, PDF y consulta para tus clientes.'],
        ['icono' => '⚙️', 'titulo' => 'Sistemas de gestión a tu medida', 'texto' => 'Gimnasios, condominios, repartos y más: software hecho para tu forma de trabajar, no al revés.'],
        ['icono' => '🔌', 'titulo' => 'API e integraciones SII', 'texto' => 'Conectamos tu sistema por API con proveedores de facturación electrónica autorizados, para que emitas facturas cumpliendo la normativa del SII.'],
        ['icono' => '🤝', 'titulo' => 'Asesoría y gestión de proyectos', 'texto' => '¿Necesitas algo fuera de lo común? Te ayudamos a definirlo, buscamos al especialista adecuado y supervisamos el proyecto por ti.', 'destacado' => true],
    ],

    // Sección "¿Te suena familiar?": el problema del cliente y cómo lo resolvemos.
    'soluciones' => [
        [
            'icono'    => '🛒',
            'problema' => '¿Vendes con cuaderno y calculadora? ¿No sabes cuánto vendiste hoy, tu margen, tu stock ni con qué medio de pago te pagaron?',
            'titulo'   => 'MarketSTI POS es tu solución',
            'texto'    => 'Tu punto de venta completo: ventas, stock, márgenes y medios de pago al día, en el computador o la tablet.',
            'puntos'   => ['Venta diaria y margen', 'Control de stock', 'Ventas por medio de pago', 'Boleta o factura electrónica opcional'],
        ],
        [
            'icono'    => '🧾',
            'problema' => '¿Te preocupa cambiar tu forma de trabajar y de emitir boletas?',
            'titulo'   => 'Sigue con tu boleta como siempre',
            'texto'    => 'Lo entendemos. Sigue emitiendo tu boleta con tu app E-Boleta o tu POS móvil de pago electrónico, y nosotros manejamos tu stock y tus ventas.',
            'puntos'   => ['Sin cambiar tu forma de cobrar', 'Boleta electrónica integrada: opcional', 'Factura electrónica integrada: opcional'],
        ],
        [
            'icono'    => '🔧',
            'problema' => '¿Tienes un taller mecánico y vendes repuestos, pero no tienes control de los vehículos en taller ni el historial de tus clientes?',
            'titulo'   => 'Tenemos la solución para tu taller',
            'texto'    => 'Órdenes de trabajo de principio a fin, ficha de cada vehículo con su historial y venta de repuestos en un solo sistema.',
            'puntos'   => ['Vehículos en taller en tiempo real', 'Historial por cliente y vehículo', 'Venta de repuestos y caja', 'Avisos por WhatsApp'],
        ],
        [
            'icono'    => '📲',
            'problema' => '¿Tomar inventario es un problema? ¿Anotas códigos y cantidades en planillas para después digitarlos en tu sistema?',
            'titulo'   => 'SimpleStock es tu solución',
            'texto'    => 'Convierte tu smartphone Android en un capturador de inventario y exporta el conteo en el formato que tu sistema requiera.',
            'puntos'   => ['Usa tu propio celular Android', 'Sin planillas ni doble digitación', 'Exporta en CSV u otro formato'],
        ],
        [
            'icono'    => '🧩',
            'problema' => '¿Nuestras soluciones no se adaptan del todo a tu negocio?',
            'titulo'   => 'Lo adaptamos a ti',
            'texto'    => 'Coméntanos. Sabemos que cada negocio es diferente: nuestros sistemas son altamente personalizables.',
            'puntos'   => ['Pantallas y reportes a tu medida', 'Funciones nuevas según tu necesidad'],
        ],
        [
            'icono'    => '💡',
            'problema' => '¿Tu solución no está aquí?',
            'titulo'   => 'Cuéntanos tu idea',
            'texto'    => 'Coméntanos qué necesitas y te asesoramos: lo desarrollamos nosotros o te conseguimos al especialista indicado.',
            'puntos'   => ['Asesoría sin compromiso', 'Propuesta integral'],
        ],
    ],

    'tecnologias' => ['PHP', 'MySQL', 'JavaScript', 'HTML / CSS', 'C# / .NET', 'APIs REST', 'PWA', 'Git'],
];
