

    let calendarEl = document.getElementById('calendar');
    let frm = document.getElementById('formulario');
    let eliminar = document.getElementById('btnEliminar');
    let myModal = new bootstrap.Modal(document.getElementById('myModal'));
    document.addEventListener('DOMContentLoaded', function () {
        calendar = new FullCalendar.Calendar(calendarEl, {
            timeZone: 'local',
            initialView: 'dayGridMonth',
            locale: 'es',
            headerToolbar: {
                left: 'prev next today',
                center: 'title',
                right: 'dayGridMonth timeGridWeek listWeek'
            },
            events: base_url + 'Home/listar',
            editable: true,
            dateClick: function (info) {
                frm.reset();
                eliminar.classList.add('d-none');
                document.getElementById('start').value = info.dateStr;
                document.getElementById('end').value = info.dateStr;
                document.getElementById('id').value = '';
                document.getElementById('btnAccion').textContent = 'Registrar';
                document.getElementById('titulo').textContent = 'Registrar Evento';
                myModal.show();
            },

            eventClick: function (info) {
                document.getElementById('id').value = info.event.id;
                document.getElementById('title').value = info.event.title;
                document.getElementById('start').value = info.event.startStr;
                document.getElementById('end').value = info.event.endStr;
                document.getElementById('color').value = info.event.backgroundColor;
                document.getElementById('btnAccion').textContent = 'Modificar';
                document.getElementById('titulo').textContent = 'Actualizar Evento';
                eliminar.classList.remove('d-none');
                myModal.show();
            },
            eventDrop: function (info) {
                const start = info.event.startStr;
                const end = info.event.endStr;
                const id = info.event.id;
                const url = base_url + 'Home/drag';
                const http = new XMLHttpRequest();
                const formDta = new FormData();
                formDta.append('start', start);
                formDta.append("end", end);
                formDta.append('id', id);
                http.open("POST", url, true);
                http.send(formDta);
                http.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                        const res = JSON.parse(this.responseText);
                        Swal.fire(
                            'Avisos',
                            res.msg,
                            res.tipo
                        )
                        if (res.estado) {
                            myModal.hide();
                            calendar.refetchEvents();
                        }
                    }
                }
            }

        });
        
        calendar.render();
        frm.addEventListener('submit', function (e) {
            e.preventDefault();
            const title = document.getElementById('title').value;
            const start = document.getElementById('start').value;
            const end = document.getElementById('end').value;
            if (title == '' || start == '' || end == '') {
                Swal.fire(
                    'Avisos',
                    'Todo los campos son obligatorios',
                    'warning'
                )
            } else {
                const url = base_url + 'Home/registrar';
                const http = new XMLHttpRequest();
                http.open("POST", url, true);
                http.send(new FormData(frm));
                http.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                        const res = JSON.parse(this.responseText);
                        Swal.fire(
                            'Avisos?',
                            res.msg,
                            res.tipo
                        )
                        if (res.estado) {
                            myModal.hide();
                            calendar.refetchEvents();
                        }
                    }
                }
            }
        });
        eliminar.addEventListener('click', function () {
            myModal.hide();
            Swal.fire({
                title: 'Advertencia',
                text: "Esta seguro de eliminar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const url = base_url + 'Home/eliminar/' + document.getElementById('id').value;
                    const http = new XMLHttpRequest();
                    http.open("GET", url, true);
                    http.send();
                    http.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log(this.responseText);
                            const res = JSON.parse(this.responseText);
                            Swal.fire(
                                'Avisos?',
                                res.msg,
                                res.tipo
                            )
                            if (res.estado) {
                                calendar.refetchEvents();
                            }
                        }
                    }
                }
            })
        });
    })


// Obtener una referencia al botón Descargar PDF
const btnDescargarPDF = document.getElementById('btnDescargarPDF');

// Agregar un controlador de eventos para el clic en el botón
btnDescargarPDF.addEventListener('click', () => {
  // Crear un nuevo objeto jsPDF
  const pdf = new jsPDF();
  
  // Obtener todos los eventos en el calendario
  const eventos = calendar.getEvents();

  // Crear una tabla para mostrar los eventos
  const table = crearTablaEventos(eventos);

  // Agregar la tabla al documento PDF
  pdf.autoTable({ html: table });

  // Descargar el documento PDF
  pdf.save('calendario.pdf');
});

// Función auxiliar para crear una tabla con los eventos
function crearTablaEventos(eventos) {
  // Crear una tabla HTML
  const table = document.createElement('table');

  // Agregar una fila para los encabezados
  const encabezados = ['Título', 'Fecha de inicio', 'Fecha de fin'];
  const encabezadosRow = document.createElement('tr');
  encabezados.forEach((encabezado) => {
    const th = document.createElement('th');
    th.textContent = encabezado;
    encabezadosRow.appendChild(th);
  });
  table.appendChild(encabezadosRow);

  // Agregar una fila para cada evento
  eventos.forEach((evento) => {
    const row = document.createElement('tr');
    const titleCell = document.createElement('td');
    titleCell.textContent = evento.title;
    row.appendChild(titleCell);
    const startCell = document.createElement('td');
startCell.textContent = evento.start ? evento.start.toLocaleString() : "-";
    row.appendChild(startCell);
    const endCell = document.createElement('td');
endCell.textContent = evento.end ? evento.end.toLocaleString() : "-";

    row.appendChild(endCell);
    table.appendChild(row);
  });

  return table;
}


// Obtener una referencia al botón Descargar PDF
const btnDescargarPDFXMes = document.getElementById('btnDescargarPDFXMes');

// Obtener una referencia al selector de mes
const monthSelector = document.getElementById('month-selector');

// Agregar un controlador de eventos para el clic en el botón
btnDescargarPDFXMes.addEventListener('click', () => {
  // Obtener el mes seleccionado
  const selectedMonth = parseInt(monthSelector.value);

  // Obtener todos los eventos en el calendario
  const eventos = calendar.getEvents();

  // Filtrar los eventos por mes
  const eventosFiltrados = eventos.filter((evento) => {
    return evento.start.getMonth() === selectedMonth;
  });

  // Crear una tabla para mostrar los eventos
  const table = crearTablaEventos(eventosFiltrados);

  // Crear un nuevo objeto jsPDF
  const pdf = new jsPDF();
  
  // Agregar la tabla al documento PDF
  pdf.autoTable({ html: table });

  // Descargar el documento PDF
  pdf.save('calendario.pdf');
});

// Función auxiliar para crear una tabla con los eventos
function crearTablaEventos(eventos) {
  // Crear una tabla HTML
  const table = document.createElement('table');

  // Agregar una fila para los encabezados
  const encabezados = ['Título', 'Fecha de inicio', 'Fecha de fin'];
  const encabezadosRow = document.createElement('tr');
  encabezados.forEach((encabezado) => {
    const th = document.createElement('th');
    th.textContent = encabezado;
    encabezadosRow.appendChild(th);
  });
  table.appendChild(encabezadosRow);

  // Agregar una fila para cada evento
  eventos.forEach((evento) => {
    const row = document.createElement('tr');
    const titleCell = document.createElement('td');
    titleCell.textContent = evento.title;
    row.appendChild(titleCell);
    const startCell = document.createElement('td');
     startCell.textContent = evento.start ? evento.start.toLocaleString() : "-";
    row.appendChild(startCell);
    const endCell = document.createElement('td');
 endCell.textContent = evento.end ? evento.end.toLocaleString() : "-";
    row.appendChild(endCell);
    table.appendChild(row);
  });

  return table;
}
