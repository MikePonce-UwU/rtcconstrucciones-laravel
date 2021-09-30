##Al momento de descargar el proyecto
Vas a tener que hacer lo siguiente, estos son pasos a hacer a la hora de vincular la base de datos con el proyecto:
. primero tenes que correr "npm install" en la terminal del proyecto.
.correr "npm run dev".
.luego tenes que correr "php artisan migrate".
.luego con la base de datos que paso fernando, importarlo en la base de datos del proyecto.
. tenes que correr el seeder que esta en database/seeder/PermissionTableSeeder.php con el siguiente comando: "php artisan db:seed --class=PermissionTableSeeder"
. tenes que correr el seeder que esta en database/seeder/CreateAdminUserSeeder.php con el siguiente comando: "php artisan db:seed --class=CreateAdminUserSeeder"
.correr "php artisan serve" y luego correr "npm run watch", este ultimo corre un sincronizador de navegadores que al momento de guardar el proyecto recarga automaticamente la pagina.
