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
| `index.html` | Textos y estructura de la página |
| `assets/style.css` | Diseño y animaciones |
| `assets/app.js` | Efectos (titular que se escribe, aparición al hacer scroll, contadores) |
| `assets/copihue.svg` | Ícono del copihue |

Las palabras que se van escribiendo en el titular están en el atributo `data-palabras` del elemento `<span class="rota">` en `index.html`.

Si cambias `style.css` o `app.js`, sube el número `?v=1` en `index.html` (a `?v=2`, etc.) para que los navegadores carguen la versión nueva.
