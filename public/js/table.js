document.addEventListener('livewire:load', function () {
    let dataTable = null; // Variable para almacenar la instancia de DataTables
    // Función para inicializar DataTables
    function initializeDataTable() {
        if (dataTable !== null) {
            dataTable.destroy();
        }

        if ($('.table-livewire tbody tr').length > 0) {
            dataTable = $('.table-livewire').DataTable({
                responsive: true,
                autoWidth: true,
                deferRender: true,
                order: [],
                "language": {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
                }
            });
        }
        
    }

    // Inicializar DataTables cuando Livewire termine de cargar la página
    initializeDataTable();

    // Escuchar eventos de Livewire para actualizar la tabla
    Livewire.on('tableUpdated', function () {
        initializeDataTable();
    });
});