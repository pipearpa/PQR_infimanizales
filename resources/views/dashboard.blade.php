<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@vite(['resources/css/dashboard.css'])

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="padding: 8px; border-radius: 20px;">
            <div class="contenido overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900">
                    <section class="filtro"> {{-- MARK:NAV-TAB --}}
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-tab="Sin tramitar" href="#"
                                    onclick="showTab('Sin tramitar')">Sin tramitar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-tab="En trámite" href="#"
                                    onclick="showTab('En trámite')">En trámite</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-tab="Tramitada" href="#"
                                    onclick="showTab('Tramitada')">Tramitada</a>
                            </li>
                        </ul>
                    </section>

                    <section class="acciones">
                        <a href="http://localhost/pqr_infi_mzls/public/pdf" class="btn" id="exportarPDF"
                            style="display: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z" />
                            </svg>
                        </a>
                        <a href="{{ url('export') }}" class="btn" id="exportarExcel" style="display: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-filetype-xls" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM6.472 15.29a1.2 1.2 0 0 1-.111-.449h.765a.58.58 0 0 0 .254.384q.106.073.25.114.143.041.319.041.246 0 .413-.07a.56.56 0 0 0 .255-.193.5.5 0 0 0 .085-.29.39.39 0 0 0-.153-.326q-.152-.12-.462-.193l-.619-.143a1.7 1.7 0 0 1-.539-.214 1 1 0 0 1-.351-.367 1.1 1.1 0 0 1-.123-.524q0-.366.19-.639.19-.272.527-.422.338-.15.777-.149.457 0 .78.152.324.153.5.41.18.255.2.566h-.75a.56.56 0 0 0-.12-.258.6.6 0 0 0-.247-.181.9.9 0 0 0-.369-.068q-.325 0-.513.152a.47.47 0 0 0-.184.384q0 .18.143.3a1 1 0 0 0 .405.175l.62.143q.326.075.566.211a1 1 0 0 1 .375.358q.135.222.135.56 0 .37-.188.656a1.2 1.2 0 0 1-.539.439q-.351.158-.858.158-.381 0-.665-.09a1.4 1.4 0 0 1-.478-.252 1.1 1.1 0 0 1-.29-.375m-2.945-3.358h-.893L1.81 13.37h-.036l-.832-1.438h-.93l1.227 1.983L0 15.931h.861l.853-1.415h.035l.85 1.415h.908L2.253 13.94zm2.727 3.325H4.557v-3.325h-.79v4h2.487z" />
                            </svg>
                        </a>
                    </section>
                </div>
                {{-- MARK:PQR --}}
                <div id="paginated-content" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <ol class="list-group list-group-numbered">
                        @foreach ($pqrs as $index => $pqr)
                            <li class="pqr-card" data-estado="{{ $pqr->estado }}">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Tipo: {{ $pqr->tipo }}</div>
                                    <p>ID: {{ $pqr->id }}</p>
                                    <p>Estado: {{ $pqr->estado }}</p>
                                </div>
                                <div class="pqr-actions">
                                    <button class="btn" onclick="openModal('{{ $pqr->id }}')">Ver
                                        Detalles</button>
                                </div>
                            </li>
                            {{-- MARK:MODAL --}}
                            <!-- Modal -->
                            <div id="modal-{{ $pqr->id }}" class="modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <span class="close" onclick="closeModal('{{ $pqr->id }}')">&times;</span>
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-weight: 700;">PQR ID:
                                                {{ $pqr->id }}</h5>
                                                <a href="{{ route('export.pdf', $pqr->id) }}" class="btn btn-primary"
                                                    target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                                    class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z" />
                                                </svg></a>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Estado:</strong> {{ $pqr->estado }}</p>
                                            <p><strong>Tipo:</strong> {{ $pqr->tipo }}</p>
                                            <p><strong>Descripción:</strong> {{ $pqr->descripcion }}</p>
                                            <br>
                                            <hr>
                                            <br>
                                            <p><strong>Fecha de creación:</strong> {{ $pqr->created_at }}</p>
                                            <p><strong>Usuario:</strong> {{ $pqr->nombre }}</p>
                                            <p><strong>Tipo de documento:</strong> {{ $pqr->tipoDocumento }}</p>
                                            <p><strong>Número de documento:</strong> {{ $pqr->numero_documento }}</p>
                                            <p><strong>Correo electrónico:</strong> {{ $pqr->email }}</p>
                                            <p><strong>Número de teléfono:</strong> {{ $pqr->numeroTel }}</p>
                                            <p><strong>Dirección:</strong> {{ $pqr->direccion }}</p>
                                            <p><strong>Medio de Respuesta:</strong> {{ $pqr->respuesta }}</p>
                                            <br>
                                            <p><strong>Archivo Adjuntos:</strong>
                                                @if ($pqr->archivo)
                                                    <a href="{{ route('download', $pqr->id) }}" class="btn"
                                                        id="descargar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="currentColor"
                                                            class="bi bi-file-arrow-down-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M8 5a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5A.5.5 0 0 1 8 5" />
                                                        </svg> Descargar Archivo
                                                    </a>
                                                @else
                                                    <strong>Sin archivo adjunto</strong>
                                                @endif
                                            </p>
                                            <br>
                                            <!-- Agregar enlace para exportar a PDF -->
                                            

                                        </div>
                                        <div class="modal-footer">
                                            @if ($pqr->estado === 'Sin tramitar')
                                                <form action="{{ route('pqrs.marcarEnTramite', $pqr->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn" id="botonMarcar">Marcar como
                                                        En
                                                        trámite</button>
                                                </form>
                                            @else
                                                <form action="{{ route('pqrs.marcarTramitada', $pqr->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn" id="botonMarcar">Marcar como
                                                        Tramitada</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </ol>
                </div>
                <!-- Aquí se encuentra el paginador --> {{-- MARK:PAGINADOR --}}
                <div id="pagination" class="px-6 py-4 flex flex-wrap justify-center items-center">
                    <div id="acomodar">
                        <nav aria-label="Page navigation example">
                            <div id="acomodar1">
                                <select id="itemsPerPageSelect" style="width: 60px;">
                                    <option value="3">3</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                </select>
                                <ul class="pagination justify-content-center" id="pagination-container">
                                    <li class="page-item ">
                                        <a class="page-link" id="prev-page" href="#">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" id="next-page" href="#">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-U1W1WqQOG3zIFz9g2V2Cq6Mplplml5dlQfwQ91LW6Fypf82i2R4kOnzI42P3rjG" crossorigin="anonymous"> --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.2/dist/jquery.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-O4lQ2B74G25gR169MCw6pQ1q4kZ05Q4Qz9i7Q7Q7tWR7F+qP0pK6U1ZI4hQzV3" crossorigin="anonymous"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

{{-- MARK:SCRIPTS --}}

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let itemsPerPage = 3; // Número de elementos por página inicial
        const contentContainer = document.getElementById('paginated-content');
        const paginationContainer = document.getElementById('pagination-container');
        const itemsPerPageSelect = document.getElementById('itemsPerPageSelect');
        const totalItems = {{ count($pqrs) }}; // Total de elementos
        let currentPage = 1; // Página actual
        let totalPages = Math.ceil(totalItems / itemsPerPage); // Total de páginas

        // Función para mostrar los elementos de la página actual
        function displayCurrentPage() {
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

            // Oculta todos los elementos primero
            const items = contentContainer.querySelectorAll('.pqr-card');
            items.forEach(item => item.style.display = 'none');

            // Muestra solo los elementos de la página actual
            for (let i = startIndex; i < endIndex; i++) {
                items[i].style.display = 'flex';
            }
        }

        // Función para generar el paginador
        function generatePagination() {
            paginationContainer.innerHTML = ''; // Limpia el contenedor de paginación
            const prevPageButton = document.createElement('li');
            prevPageButton.classList.add('page-item');
            prevPageButton.innerHTML = `<a class="page-link" href="#">Previous</a>`;
            prevPageButton.addEventListener('click', () => goToPage(currentPage - 1));
            paginationContainer.appendChild(prevPageButton);

            for (let i = 1; i <= totalPages; i++) {
                const pageItem = document.createElement('li');
                pageItem.classList.add('page-item');
                pageItem.innerHTML = `<a class="page-link" href="#" data-page="${i}">${i}</a>`;
                pageItem.querySelector('.page-link').addEventListener('click', (e) => {
                    e.preventDefault();
                    goToPage(i);
                });
                paginationContainer.appendChild(pageItem);
            }

            const nextPageButton = document.createElement('li');
            nextPageButton.classList.add('page-item');
            nextPageButton.innerHTML = `<a class="page-link" href="#">Next</a>`;
            nextPageButton.addEventListener('click', () => goToPage(currentPage + 1));
            paginationContainer.appendChild(nextPageButton);

            // Actualiza los estados de los botones y la clase activa
            updatePaginationControls();
        }

        // Función para actualizar los estados de los botones y la clase activa
        function updatePaginationControls() {
            const pageLinks = paginationContainer.querySelectorAll('.page-link');
            pageLinks.forEach(link => link.classList.remove('active'));

            const prevPageButton = paginationContainer.querySelector('.page-item:first-child .page-link');
            const nextPageButton = paginationContainer.querySelector('.page-item:last-child .page-link');

            prevPageButton.parentElement.classList.toggle('disabled', currentPage === 1);
            nextPageButton.parentElement.classList.toggle('disabled', currentPage === totalPages);

            const currentPageLink = paginationContainer.querySelector(`.page-link[data-page="${currentPage}"]`);
            if (currentPageLink) {
                currentPageLink.classList.add('active');
            }
        }

        // Función para ir a una página específica
        function goToPage(page) {
            if (page >= 1 && page <= totalPages) {
                currentPage = page;
                displayCurrentPage();
                updatePaginationControls();
            }
        }

        // Event listener para el cambio de selección de elementos por página
        itemsPerPageSelect.addEventListener('change', (event) => {
            itemsPerPage = parseInt(event.target.value);
            totalPages = Math.ceil(totalItems / itemsPerPage);
            currentPage = 1; // Reiniciar a la primera página
            generatePagination();
            displayCurrentPage();
        });

        // Inicializar la paginación y mostrar la primera página
        generatePagination();
        displayCurrentPage();
    });
</script>

<script>
    function openModal(id) {
        var modal = document.getElementById('modal-' + id);
        modal.style.display = 'block';
    }

    // Función para cerrar el modal con el ID de la PQR específica
    function closeModal(id) {
        var modal = document.getElementById('modal-' + id);
        modal.style.display = 'none';
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tabs = document.querySelectorAll('.nav-link');
        const pqrsCards = document.querySelectorAll('.pqr-card');

        tabs.forEach(tab => {
            tab.addEventListener('click', function(event) {
                event.preventDefault();
                const tabId = this.getAttribute('data-tab');

                // Oculta todas las tarjetas
                pqrsCards.forEach(card => {
                    card.style.display = 'none';
                });

                // Muestra las tarjetas del estado correspondiente
                pqrsCards.forEach(card => {
                    const estadoCard = card.getAttribute('data-estado');

                    if (estadoCard === tabId) {
                        card.style.display = 'flex';
                    }
                });

                // Cambia la clase activa de la pestaña seleccionada
                tabs.forEach(tab => {
                    tab.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
    });
</script>

<script>
    function showTab(tab) {
        // Manejar el estado activo de las pestañas
        document.querySelectorAll('.nav-link').forEach(function(link) {
            link.classList.remove('active');
        });
        document.querySelector('[data-tab="' + tab + '"]').classList.add('active');

        // Mostrar u ocultar el botón de exportar a PDF con animación
        var exportarPDF = document.getElementById('exportarPDF');
        if (tab === 'Tramitada') {
            exportarPDF.style.display = 'inline-block';
            exportarPDF.classList.add('fade-in');
        } else {
            exportarPDF.style.display = 'none';
            exportarPDF.classList.remove('fade-in');
        }
        var exportarExcel = document.getElementById('exportarExcel');
        if (tab === 'Tramitada') {
            exportarExcel.style.display = 'inline-block';
            exportarExcel.classList.add('fade-in');
        } else {
            exportarExcel.style.display = 'none';
            exportarExcel.classList.remove('fade-in');
        }

        // Aquí también puedes añadir la lógica para cargar el contenido correspondiente a la pestaña seleccionada
    }

    // Al cargar la página, muestra la pestaña por defecto y configura el estado del botón
    document.addEventListener("DOMContentLoaded", function() {
        var activeTab = document.querySelector('.nav-link.active').getAttribute('data-tab');
        showTab(activeTab);
    });
</script>
