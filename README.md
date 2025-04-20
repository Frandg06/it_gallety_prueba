# Prueba Técnica LAMP - ITGallery

-   📄 **Documento de requisitos original de la prueba técnica**  
    [Ver informe](https://oval-fire-039.notion.site/Prueba-t-cnica-LAMP-ITGallery-1dbfc048a6ac8058b9bcc9a27de2dfdc?pvs=4)

-   📝 **Manual de uso**  
    [Descargar manual.pdf](./Manual_de_uso_y_procedimientos.pdf)

Realización de una ficha web para visualizar y editar datos de una obra de arte, basada en el stack LAMP.

## Tabla de Contenidos

-   [Descripción](#descripción)
-   [Requisitos](#requisitos)
-   [Stack Tecnológico](#stack-tecnológico)
-   [Pantallas a Maquetar](#pantallas-a-maquetar)
    -   [Ficha de la Obra](#ficha-de-la-obra)
    -   [Zona de Contenidos](#zona-de-contenidos)
    -   [Formulario de Edición](#formulario-de-edición)
-   [Notas Adicionales](#notas-adicionales)

## Descripción

El objetivo de esta prueba es **realizar la ficha web de una obra de arte** y **permitir editar sus datos** de forma sencilla mediante una API REST.

La prueba incluye:

-   Visualización de ficha de obra.
-   Edición de datos dinámicos.
-   Implementación de una pequeña API para la carga y actualización de obras.
-   Persistencia de datos en un modelo libre (por ejemplo, archivo JSON).

## Requisitos

-   **Diseños:** Se proporcionan en Zeplin en el siguiente enlace: XXXXX

### Datos Dinámicos Obligatorios

-   Nombre de la obra
-   Nombre del artista
-   Foto
-   Año
-   Número de inventario
-   Medidas

### Notas sobre la maquetación

-   No es necesario maquetar el menú lateral ni el menú superior.
-   El resto de campos visibles deben estar maquetados pero pueden tener contenido fijo.
-   El formulario debe incluir un campo **input file** para subida de imágenes (aunque no aparezca en el diseño).

### Obras mínimas

-   Deben configurarse **al menos 2 obras** para poder cambiar entre ellas.

### Manual de uso

-   Se debe acompañar un breve manual de uso de la ficha y el formulario.

## Stack Tecnológico

-   **Backend:** PHP (se valora el uso de Laravel).
-   **Frontend:** HTML5 + CSS3 (o SASS).
-   **Lógica Dinámica:** JavaScript "a pelo" o jQuery.
-   **API:** RESTful (GET y PUT).
-   **Persistencia:** Libre (Base de datos, JSON, archivo plano, etc).

## Pantallas a Maquetar

### Ficha de la Obra

_Captura de pantalla del diseño de la ficha._

### Zona de Contenidos

_Únicamente esta parte debe ser maquetada, sin menú lateral ni cabecera superior._

### Formulario de Edición

_Basado en el diseño de Zeplin. Incluir también un input file para la subida de imagen._

## Notas Adicionales

-   El diseño debe ser responsivo siempre que sea posible.
-   Se valorará el uso de buenas prácticas tanto en frontend como en backend.
-   El desarrollo puede partir de cero o aprovechar frameworks/librerías si el candidato lo considera oportuno.
-   Código limpio, estructurado y documentado.
