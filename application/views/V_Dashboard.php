<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inicio</title>
<link rel="stylesheet" href="<?php echo base_url('assets/Dashboard/css/style.css'); ?>">
</head>

<body>
	<button onclick="location.href=''">Regresar</button>
	
	<h1>Catálogo de Opciones</h1>

	<p>Elige una opción:</p>

	<button class ="mb-2"onclick="location.href='<?php echo site_url('usuario/index'); ?>'">Modificación / Eliminación de Usuarios Registrados</button> <!--redireccion al sitio-->
	<button onclick="location.href='http://localhost/proyecto/Tienda/3.%20Clientes.php'">Ingreso Cliente</button>
	<button onclick="location.href='http://localhost/proyecto/Tienda/2%20.%20Canchas.php'">Ingreso Cancha</button>
	<button onclick="location.href='http://localhost/proyecto/Tienda/1.%20Alquiler.php'">Ingreso Alquiler</button>
	<button onclick="location.href='http://localhost/proyecto/Tienda/5.%20Factura.html'">Registro de Facturas</button>
	<button onclick="location.href='http://localhost/proyecto/Tienda/7.DetalleProducto.html'">Detalle Facturas Productos</button>
	<button onclick="location.href='http://localhost/proyecto/Tienda/6%20DetalleAlquiler.php'">Detalle Facturas Alquileres</button>
	
</body>	
</html>