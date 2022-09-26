<div>
    <style>
        .swal2-cancel.swal2-styled {
            color: white !important;
        }
    </style>
    <a class="btn btn-sm btn-primary" onclick="generar()">Generar Horarios</a>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const intentos = 1

        function generar() {
            Swal.fire({
                title: '¿Quieres generar un nuevo horario?',
                text: "Si hay uno ya generado, este se borrara!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, si quiero!'
            }).then((result) => {
                if (result.isConfirmed) {
                    crear(intentos)
                }
            })
        }

        async function loopGenerar() {
            let result = @this.generador();
            result
                .then((response) => {
                    console.log(response);
                    if (response == 1) {
                        Swal.fire('¡Se ha creado el horario correctamente!', '', 'success')
                    }
                    if (response == 2) {
                        Swal.fire('¡Detalles en el horario creado!', 'El horario se creo, pero tal vez algunos maestos no tengan sus horas asignadas completamente. Intentelo de nuevo', 'info')
                    }
                }, function() {
                    // one or more failed
                    Swal.fire('¡Error al crear el horario!', '', 'error')
                });
        }

        function crear() {
            let timerInterval
            Swal.fire({
                title: 'Se esta creando el horario!',
                html: 'Esto puede tomar de 2 a 5 minutos.<br> Por favor espere',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            })
            let respuestaServe = loopGenerar()
        }
    </script>
</div>
