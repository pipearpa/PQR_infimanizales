<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    @vite(['resources/css/users.css', 'resources/js/users.js'])


</head>

<body>
    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        <nav class="navbar container-fluid shadow" style="background-color: #f3f3f3">
            <a href="{{ url('/dashboard') }}"
                style="display: inline-block; width: 80px; height: 90px; background-image: url('https://infimanizales.com/wp-content/uploads/2021/12/Infi-Manizales-Logo-color.png'); background-size: cover; filter: drop-shadow(2px 5px 5px rgba(0, 0, 0, 0.5)); margin: 0 auto;"></a>
        </nav>
    </header>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-8" style=" border-radius: 20px;">
            <div class="contenido overflow-hidden sm:rounded-lg">
                <section id="agregar">
                    <a href="{{ route('register') }}" class="agregarUsuario btn">Agregar un nuevo
                        usuario</a>

                    <!-- Campo de búsqueda -->
                <input type="text" id="searchUser" placeholder="Buscar usuario..." class="form-control mb-3">
                </section>



                <div id="paginated-content" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="background-color:#07356d;">Nombre</th>
                                    <th>Email</th>
                                    <th>Tipo Usuario</th>
                                    <th>Acciones</th>
                                    <th>Cambiar Estado</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
                                @foreach ($users as $user)
                                    <tr>
                                        <td data-label="Nombre">{{ $user->name }}</td>
                                        <td data-label="Email">{{ $user->email }}</td>
                                        <td data-label="Email">{{ $user->user_type }}</td>
                                        <td data-label="Acciones" id="acciones">
                                            <button class="btn btn-warning edit-user-btn" data-bs-toggle="modal"
                                                data-bs-target="#editUserModal" data-id="{{ $user->id }}"
                                                data-name="{{ $user->name }}" data-email="{{ $user->email }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg>
                                            </button>
                                        </td>
                                        <td data-label="Cambiar Estado" id="acciones">
                                            <form method="POST" action="{{ route('users.toggleActivation', $user) }}">
                                                @csrf
                                                <label class="switchBtn">
                                                    <input type="checkbox" name="activation_status" class="toggle-activation-checkbox" {{ $user->active ? 'checked' : '' }}>
                                                    <div class="slide round"></div>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Edit User Modal -->
                    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog"
                        aria-labelledby="editUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
                                </div>
                                <form id="editUserForm" method="POST"
                                    action="{{ route('users.update', ['user' => 0]) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="userName">Nombre</label>
                                            <input type="text" class="form-control" id="userName" name="name"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="userEmail">Email</label>
                                            <input type="email" class="form-control" id="userEmail" name="email"
                                                required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>




</html>
