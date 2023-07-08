
## Crud tall con ckeditor Laravel

Pasos para la instalación

* configure .env y agreggue la base de datos
* composer install
* npm install
* npm run build
*  php artisan migrate --seed

 # Acerca del proyecto

 Se ultilizo una libreria de tailwind  llamada preline, la cual trae algunos componenetes diseñados en tailwind con javascript como los modales

 # ckeditor 5

Se uso la version gratuita y se integro con alphine

# Generales
* se agrego laravel brezze para autenticacion 
* se creo un componente llamado editor el cual para funcionar requiere del "wire:model='propiedad'" y algunos eventos que permiten que funcione correctamente
* Se creo un scope para hacer busquedas
* se pagino el crud
* se agrego una barra de carga de archivos
* se agrego un boton para el satus
* depues de guardar el modal se cierra y renderiza el componente BlogIndex para mostrar los archivos
* el componente BlogCreate se reutiliza para crear y actualizar la data correspondiente
* el componente modal-delete igual es reutilizable 

