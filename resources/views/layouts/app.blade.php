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

        #crm-sidebar {
            width: 300px; 
            background: var(--sidebar-bg) !important;
            color: white;
            padding: 50px 20px;
            box-shadow: -4px 0 15px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
        }

        .pagination-wrapper {
            margin: 40px 0;
            width: 100%;
            display: flex !important;
            justify-content: center !important;
        }

        .pagination-wrapper nav p,
        .pagination-wrapper nav > div:first-child {
            display: none !important;
        }

        .pagination-wrapper ul, 
        .pagination-wrapper .pagination {
            display: flex !important;
            flex-direction: row !important; 
            list-style: none !important;
            list-style-type: none !important;
            padding: 0 !important;
            margin: 0 !important;
            gap: 8px !important;
        }

        .pagination-wrapper li {
            list-style: none !important;
            list-style-type: none !important;
            margin: 0 !important;
            padding: 0 !important;
            display: block !important;
        }
        
        .pagination-wrapper li::before,
        .pagination-wrapper li::marker {
            content: none !important;
            display: none !important;
        }

        .pagination-wrapper li a, 
        .pagination-wrapper li span,
        .pagination-wrapper .page-link {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            min-width: 42px !important;
            height: 42px !important;
            padding: 0 12px !important;
            background: white !important;
            border: 1px solid #cbd5e1 !important;
            color: #475569 !important;
            text-decoration: none !important;
            border-radius: 10px !important;
            font-weight: 700 !important;
            font-size: 0.9rem !important;
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }

        .pagination-wrapper li.active span,
        .pagination-wrapper li[aria-current="page"] span,
        .pagination-wrapper .page-item.active .page-link {
            background: var(--sidebar-bg) !important;
            color: white !important;
            border-color: var(--sidebar-bg) !important;
        }

        .pagination-wrapper li a:hover {
            background: #f1f5f9 !important;
            border-color: var(--primary) !important;
            color: var(--primary) !important;
            transform: translateY(-1px);
        }

        .pagination-wrapper li.disabled span {
            background: #f8fafc !important;
            color: #cbd5e1 !important;
            border-color: #e2e8f0 !important;
            cursor: not-allowed !important;
            opacity: 0.6;
        }

        #crm-sidebar .logo-wrapper { text-align: center; margin-bottom: 50px; }
        #crm-sidebar .logo-container { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); padding: 20px; border-radius: 15px; display: inline-block; border: 1px solid rgba(255, 255, 255, 0.2); }
        #crm-sidebar .logo-container img { width: 100px; height: auto; display: block; }
        #crm-sidebar .brand-name { font-size: 1.4rem; font-weight: 700; letter-spacing: 4px; text-transform: uppercase; color: white; margin-top: 15px; }
        #crm-sidebar ul { list-style: none; padding: 0; margin: 20px 0 0 0; }
        #crm-sidebar ul li { margin-bottom: 12px; }
        #crm-sidebar ul li a { color: var(--text-nav); text-decoration: none; font-size: 1.15rem; display: block; padding: 15px 25px; border-radius: 10px; transition: all 0.2s ease; font-weight: 500; }
        #crm-sidebar ul li a:hover { background: var(--sidebar-hover); color: var(--primary); padding-left: 30px; }

        main { flex: 1; padding: 40px; max-width: calc(100vw - 300px); }
    </style>
</head>
<body>

    @auth
    <nav id="crm-sidebar">
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

    <main>
        @yield('content')
    </main>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                "language": { "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json" },
                "paging": false, 
                "info": false,
                "destroy": true,
                "autoWidth": false
            });
        });
    </script>
</body>
</html>