<head>
  <!-- SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>

<script>
        function confirmarEliminacion(history_id) {
            Swal.fire({
                title: '¿Estás seguro de eliminar el registro?',
                text: 'Esta acción no se puede deshacer',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma la eliminación, redirige a eliminar_historia.php
                    window.location.href = 'eliminar_historia.php?history_id=' + history_id;
                }
            });
        }
    </script>

    <!-- SweetAlert JS al final del cuerpo -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>