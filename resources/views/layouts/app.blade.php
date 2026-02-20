<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRMVALLE - Gestión Empresarial</title>
    <style>
        :root {
            --primary: #10b981; 
            --sidebar-bg: #2f9440; 
            --sidebar-hover: #475569;
            --bg-main: #f8fafc;
            --text-nav: #f1f5f9;
        }

        body {
            display: flex;
            flex-direction: row-reverse; 
            margin: 0;
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background-color: var(--bg-main);
            min-height: 100vh;
        }

        nav {
            width: 300px; 
            background: var(--sidebar-bg);
            color: white;
            padding: 50px 20px;
            box-shadow: -4px 0 15px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
        }

        .logo-wrapper {
            text-align: center;
            margin-bottom: 50px;
        }

        .logo-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 15px;
            display: inline-block;
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 100px;
            height: auto;
            display: block;
        }

        .brand-name {
            font-size: 1.4rem; 
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: white;
            margin: 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 20px 0 0 0;
        }

        nav ul li {
            margin-bottom: 12px;
        }

        nav ul li a {
            color: var(--text-nav);
            text-decoration: none;
            font-size: 1.15rem; 
            display: block;
            padding: 15px 25px;
            border-radius: 10px;
            transition: all 0.2s ease;
            font-weight: 500;
        }

        nav ul li a:hover {
            background: var(--sidebar-hover);
            color: var(--primary);
            padding-left: 30px;
        }

        main {
            flex: 1;
            padding: 40px;
            max-width: calc(100vw - 300px);
        }

        .alert {
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 35px;
            font-size: 1rem;
            border-left: 5px solid transparent;
        }

        .alert-success {
            background: #f0fdf4;
            color: #166534;
            border-left-color: var(--primary);
        }

        .alert-error {
            background: #fef2f2;
            color: #991b1b;
            border-left-color: #ef4444;
        }

        .btn-primary {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(16, 185, 129, 0.2);
            margin-bottom: 25px;
        }

        .btn-primary:hover {
            background-color: #059669;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(16, 185, 129, 0.3);
            color: white;
        }

        .page-title {
            font-size: 1.8rem;
            color: #1e293b;
            margin-bottom: 30px;
            font-weight: 700;
        }
    </style>
</head>
<body>

    @auth
    <nav>
        <div class="logo-wrapper">
            <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="CRMVALLE">
            </div>
            <p class="brand-name">CRMVALLE</p>
        </div>

        <ul>
            <li><a href="{{ url('/home') }}">Dashboard</a></li>
            <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
            <li><a href="{{ route('productos.index') }}">Productos</a></li>
            <li><a href="{{ route('pedidos.index') }}">Pedidos</a></li>
            <li><a href="{{ route('proveedores.index') }}">Proveedores</a></li>
            <li><a href="{{ route('empleados.index') }}">Empleados</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: var(--text-nav); font-size: 1.15rem; font-weight: 500; cursor: pointer; padding: 15px 25px; width: 100%; text-align: left; border-radius: 10px;">
                        Cerrar Sesión
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    @endauth

    <main style="{{ !Auth::check() ? 'max-width: 100%; flex: 1;' : '' }}">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'none';

        
        const tablas = [
            '#tabla-productos', 
            '#tabla-clientes', 
            '#tabla-pedidos', 
            '#tabla-proveedores', 
            '#tabla-empleados'
        ];

        
        tablas.forEach(function(id) {
            if ($(id).length > 0) {
                $(id).DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
                    },
                    "responsive": true,
                    "destroy": true 
                });
            }
        });
    });
</script>

</body>
</html>