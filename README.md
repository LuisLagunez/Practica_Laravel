# 📸 Módulo de Gestión de Imágenes Públicas en Laravel

Este módulo permite listar, almacenar y eliminar imágenes públicas que se mostrarán en la vista `imghero` de una aplicación Laravel.

---


---

## 📂 Controlador: `ImgController`

**Ubicación:** `app/Http/Controllers/ImgController.php`

Controlador que gestiona las operaciones CRUD de imágenes públicas.

### 📌 Métodos:

- `index()`
  - Obtiene todas las imágenes desde la base de datos.
  - Retorna la vista `imghero` con las imágenes.

- `store(Request $request)`
  - Valida los datos recibidos:
    - `name` → requerido.
    - `path` → requerido, imagen en formato `.webp`, máximo 2MB.
    - `alt` → opcional.
  - Almacena la imagen en `storage/app/public/landing`.
  - Registra los datos en la base de datos.
  - Redirige con un mensaje de éxito.

- `destroy(Request $request, $id)`
  - Elimina el registro de la imagen en la base de datos.
  - Redirige con un mensaje de éxito.

---

## 📂 Modelo: `ImgPublic`

**Ubicación:** `app/Models/ImgPublic.php`

Representa la tabla `img_publics` en la base de datos.

### 📌 Propiedades:

- `HasFactory`
- `$fillable`
  - `name`
  - `path`
  - `alt`

---

## 📂 Migraciones

**Ubicación:** `database/migrations/`

### 📌 2025_03_22_070225_create_img_publics_table.php

Crea la tabla `img_publics` con:

- `id`
- `name`
- `path`
- `timestamps`

### 📌 2025_03_28_053505_add_alt_to_img_publics.php

Agrega la columna `alt` (nullable) a `img_publics`.

---

## 📂 Rutas Web

**Ubicación:** `routes/web.php`

### 📌 Definiciones:

| Método HTTP | Ruta        | Acción                       | Nombre de la ruta |
|:------------|:------------|:-----------------------------|:----------------|
| GET        | `/`          | `ImgController@index`         | `imghero`       |
| POST       | `/`          | `ImgController@store`         | `imghero.store` |
| DELETE     | `/{id}`      | `ImgController@destroy`       | `imghero.destroy`|

---

## 📌 Flujo General

1. Usuario accede a `/` → `index()`.
2. Desde la vista:
   - Subir imagen → `POST /` → `store()`.
   - Eliminar imagen → `DELETE /{id}` → `destroy()`.

---

## 📦 Almacenamiento de Imágenes

Las imágenes se guardan en `storage/app/public/landing`, y se almacena el nombre del archivo en la base de datos.

**Nota:** Solo se permiten imágenes `.webp`.





# Instalación y Configuración

Este proyecto está desarrollado en **Laravel** y requiere unos pasos sencillos para estar en funcionamiento en tu máquina local.


## Requisitos

- PHP >= 8.x
- Composer
- Node.js y NPM
- MySQL


---

## Pasos de instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/Compucare-IT-Solutions/CRUD-LARAVEL-EXAMPLE.git
cd CRUD-LARAVEL-EXAMPLE
```

### 2. Instalar dependencias PHP (backend)

```bash
composer install
```

### 3. Instalar dependencias JavaScript (frontend)

```bash
npm install
```

---

## Configuración del entorno

### 4. Crear archivo `.env`

Copia el archivo de ejemplo:

```bash
cp .env.example .env
```

### 5. Configurar base de datos

Edita el archivo `.env` y coloca tus datos de conexión MySQL:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

---

## Inicialización del proyecto

### 6. Generar la llave de la aplicación

```bash
php artisan key:generate
```

### 7.  Ejecutar migraciones

```bash
php artisan migrate
```

*(Opcional: Si quieres ejecutar también los seeders)*

```bash
php artisan db:seed
```

### 8. Crear enlace simbólico de la carpeta de archivos de caché

```bash
php artisan storage:link
```

---

## 9. Levantar el servidor de desarrollo

```bash
php artisan serve
```

Accede desde tu navegador a:  
> [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Notas adicionales

- Si haces cambios en los archivos de configuración, limpia cachés:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

- Para compilar los assets de frontend:

```bash
npm run dev
```
o en modo producción:

```bash
npm run build
```

---