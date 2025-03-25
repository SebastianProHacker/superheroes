# Sistema de Superhéroes - Laravel 7

## Cambios Recientes

### 🚀 Nueva Funcionalidad
1. **Gestión de imágenes locales**
   - Reemplazo de URLs externas por almacenamiento local
   - Soporte para subida de archivos (JPEG, PNG, JPG, GIF)
   - Límite de tamaño: 2MB por imagen

2. **Borrado suave (Soft Delete)**
   - Implementación de eliminación lógica
   - Nueva tabla `deleted_at` en migración
   - Modelo actualizado con `SoftDeletes`

3. **Sistema de papelera**
   - Nueva ruta `/superheroes/trashed`
   - Vista especial para registros eliminados
   - Función de restauración

### 🛠️ Cambios Técnicos
```bash
# Migración añadida
php artisan make:migration add_soft_deletes_to_superheroes_table

# Configuración necesaria
php artisan storage:link
