<?php

return [
	
	'user-management' => [
		'title' => 'User Management',
		'created_at' => 'Time',
		'fields' => [
		],
	],
	
	'permissions' => [
		'title' => 'Permissions',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Name',
		],
	],
	
	'roles' => [
		'title' => 'Roles',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Nombre',
			'permission' => 'Permisos',
		],
	],
	
	'users' => [
		'title' => 'Usuarios',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Nombre',
			'email' => 'Correo Electronico',
			'password' => 'Contraseña',
			'roles' => 'Roles',
			'remember-token' => 'Remember token',
		],
	],
	'app_create' => 'Crear',
	'app_save' => 'Guardar',
	'app_edit' => 'Editar',
	'app_view' => 'Visualizar',
	'app_update' => 'Actualizar',
	'app_list' => 'Lista',
	'app_no_entries_in_table' => 'No entries in table',
	'custom_controller_index' => 'Custom controller index.',
	'app_logout' => 'Cerrar sección',
	'app_add_new' => 'Agregar nuevo',
	'app_are_you_sure' => 'Estas seguro?',
	'app_back_to_list' => 'Volver a la lista',
	'app_dashboard' => 'Dashboard',
	'app_delete' => 'Eliminar',
	'global_title' => 'NETInsura',
];