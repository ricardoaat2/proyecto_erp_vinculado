## Proyecto ERP vinculado

Estructura 

erp-contable/
├── config/
│   └── database.php                 # Conexión centralizada mediante PDO
├── controllers/
│   ├── AuthController.php           # Login y control de sesión
│   ├── CuentaController.php         # Gestión del catálogo de cuentas
│   └── AsientoController.php        # Registro y validación de libro diario
├── models/
│   ├── Cuenta.php                   # Consultas SQL a la tabla de cuentas
│   └── Asiento.php                  # Transacciones SQL (BEGIN TRANSACTION, COMMIT)
├── views/
│   ├── layouts/
│   │   ├── header.php               # Cabecera HTML y estilos
│   │   └── footer.php               # Pie de página y scripts
│   ├── login.php                    # Formulario de acceso
│   └── asientos/
│       ├── index.php                # Listado del libro diario
│       └── create.php               # Formulario para registrar asiento
├── public/                          # Punto de entrada público (si se desea) o en raíz
│   └── index.php                    # Enrutador básico / Front Controller
├── .gitignore                       # Ignora credenciales y temporales
└── README.md                        # Manual de instalación para cualquier máquina


# [placeholder-SobreLaEmpresayElProyecto]  


# [placeholder-SobreContaduria]  


# [placeholder-SobreGerencial]  
