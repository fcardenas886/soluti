# SoluTI · Soluciones Tecnológicas Integrales

Página web de SoluTI, desarrollo de software a medida desde Loncoche, Región de La Araucanía.

Es una página HTML estática: no necesita PHP ni base de datos, así que funciona en GitHub Pages o en cualquier hosting.

## Ver la página

- En línea: https://fcardenas886.github.io/soluti
- En el computador: abrir `index.html` en el navegador, o con Laragon en `http://portafolio.test`.

## Editar contenido

Todos los textos están en `index.html`.

| Archivo | Contenido |
| --- | --- |
| `index.html` | Textos, estructura, íconos e ilustraciones de los productos |
| `assets/style.css` | Diseño |
| `assets/app.js` | Botones de contacto, menú en celular y aparición al hacer scroll |
| `assets/copihue.svg` | Ícono del copihue |

### Contacto y WhatsApp

En la etiqueta `<body>` de `index.html`:

- `data-email`: el correo al que llegan las consultas.
- `data-whatsapp`: el número con código de país, sin `+` ni espacios (ej. `56912345678`). Si se completa, los botones abren WhatsApp con el mensaje ya escrito y aparece el botón flotante. Si se deja vacío, los botones abren el correo.

El mensaje de cada botón está en su atributo `data-msg`.

### Ilustraciones de los productos

Las pantallas de MarketSTI, del taller y de SimpleStock están dibujadas con HTML y CSS (bloques `prod-visual`). Se pueden reemplazar por capturas reales con una etiqueta `<img>`.

Si cambias `style.css` o `app.js`, sube el número `?v=6` en `index.html` (a `?v=7`, etc.) para que los navegadores carguen la versión nueva.

Las palabras que se van escribiendo en el titular están en el atributo `data-palabras` del elemento `<span class="rota">` en `index.html`.
