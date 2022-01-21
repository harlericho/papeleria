var app = new function () {
    this.id_libro = document.getElementsByName('id')[0];
    this.isbn = document.getElementsByName("isbn")[0];
    this.titulo = document.getElementsByName("titulo")[0];
    this.precio_c = document.getElementsByName("precio_c")[0];
    this.precio_c_u = document.getElementsByName("precio_c_u")[0];
    this.precio_v = document.getElementsByName("precio_v")[0];
    this.stock = document.getElementsByName("stock")[0];
    this.imagen = document.getElementById("imagenCargada");
    this.tablaLibro = document.getElementById("tablaLibro");
    //Modals
    this.modalCerrar_a = document.getElementById("modalCerrar_a");
    this.modalCerrar_v = document.getElementById("modalCerrar_v");

    // Abastecer libros modal 1
    this.id_libro_a = document.getElementsByName("id_libro_a")[0];
    this.isbn_a = document.getElementsByName("isbn_a")[0];
    this.titulo_a = document.getElementsByName("titulo_a")[0];
    this.stock_a = document.getElementsByName("stock_a")[0];
    this.stock_a_nuevo = document.getElementsByName("stock_nuevo_a")[0];

    // Vender libro modal 2
    this.id_libro_v = document.getElementsByName("id_libro_v")[0];
    this.isbn_v = document.getElementsByName("isbn_v")[0];
    this.titulo_v = document.getElementsByName("titulo_v")[0];
    this.stock_v = document.getElementsByName("stock_v")[0];
    this.stock_v_v = document.getElementsByName("stock_v_v")[0];
    this.precio_v_v = document.getElementsByName("precio_v_v")[0];
    this.stock_vender_v = document.getElementsByName("stock_vender_v")[0];
    this.fecha_v = document.getElementsByName("fecha_vender_v")[0];
    this.tipo_transaccion = document.getElementById("tipo_transaccion");

    this.registro = () => {
        let form = new FormData(document.getElementById('formLibro'));
        if (this.id_libro.value == "") {
            //console.log("Registrando libro");
            this.insertar(form);
        } else {
            //console.log("Actualizando libro");
            this.actualizar(form);
        }
    }
    this.insertar = (form) => {
        fetch('../controllers/libroController.php', {
            method: 'POST',
            body: form,
        })
            .then(res => res.json())
            .then((data) => {
                if (data === 1) {
                    Swal.fire({
                        title: 'Registro exitoso',
                        text: 'El libro se registro correctamente',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    })
                    document.getElementById('formLibro').reset();
                    this.listado();
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: 'El libro no se registro correctamente, ya existe el ISBN',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    })
                }
            })
            .catch(err => console.log(err));
    }
    this.actualizar = (form) => {
        fetch('../controllers/libroActualizarController.php', {
            method: 'POST',
            body: form,
        })
            .then(res => res.json())
            .then((data) => {
                if (data === 1) {
                    Swal.fire({
                        title: 'Actualización exitosa',
                        text: 'El libro se actualizo correctamente',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    })
                    document.getElementById('formLibro').reset();
                    this.listado();
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: 'El libro no se actualizo correctamente, ya existe el ISBN',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    })
                }
            })
            .catch(err => console.log(err));
    }
    this.listado = () => {
        fetch('../controllers/listadoLibroController.php', {
            method: 'GET',
        })
            .then(res => res.json())
            .then((data) => {
                html = []
                html += "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>"
                html += "<thead> <tr>"
                html += "<th class='text-center'>ISBN</th>"
                html += "<th class='text-center'>Imagen</th>"
                html += "<th class='text-center'>Titulo</th>"
                html += "<th class='text-center'>Precio compra</th>"
                html += "<th class='text-center'>Precio venta + IVA (12)</th>"
                html += "<th class='text-center'>Stock</th>"
                html += "<th colspan='4' class='text-center'>Acciones</th>"
                html += "</tr></thead><tbody>"
                data.forEach(element => {
                    html += "<tr class='text-center'>"
                    html += "<td> <b>" + element.isbn + "</b></td>"
                    html += "<td><img src='../static/uploads/" + element.imagen + "' width='50' height='50'></td>"
                    html += "<td>" + element.titulo + "</td>"
                    html += "<td style='color:gray'>" + element.precio_c + "</td>"
                    html += "<td style='color:green'>" + element.precio_v + "</td>"
                    if (element.stock != 0) {
                        html += "<td class='center' style='color:blue'><strong>" + element.stock + "</strong></td>"
                    } else {
                        html += "<td class='center' style='color:red'><strong>" + element.stock + "</strong></td>"
                    }
                    html += "<td class='center'><button class='btn btn-success btn-sm' onclick='app.abastecer(" + element.id_libro + ")' data-toggle='modal' data-target='#myModal'><i class='fa fa-plus'></i> Abastecer</button>"
                    html += "<button class='btn btn-info btn-sm' onclick='app.vender(" + element.id_libro + ")' data-toggle='modal' data-target='#myModal1'><i class='fa fa-usd'></i> Vender</button>"
                    html += "<button class='btn btn-primary btn-sm' onclick='app.editar(" + element.id_libro + ")'><i class='fa fa-edit'></i> Editar</button>"
                    html += "<button class='btn btn-danger btn-sm' onclick='app.eliminar(" + element.id_libro + ")'><i class='fa fa-trash'></i> Eliminar</button></td>"
                })
                html += "</tr></tbody></table>"
                this.tablaLibro.innerHTML = html;
            })
            .catch(err => console.log(err));
    }
    this.editar = (id) => {
        var form = new FormData();
        form.append('id', id);
        fetch('../controllers/obtenerLibroController.php', {
            method: 'POST',
            body: form
        })
            .then(res => res.json())
            .then((data) => {
                this.isbn.value = data['isbn'];
                this.titulo.value = data['titulo'];
                this.precio_c.value = data['precio_c'];
                this.precio_c_u.value = data['precio_c'];
                this.stock.value = data['stock'];
                this.precio_v.value = data['precio_v'];
                this.id_libro.value = data['id_libro'];
                this.imagen.innerHTML = "<img src='../static/uploads/" + data['imagen'] + "' width='50' height='50'>"
            })
            .catch(err => console.log(err));
    }
    this.eliminar = (id) => {
        var form = new FormData();
        form.append('id', id);
        Swal.fire({
            title: '¿Estas seguro?',
            text: "¡No podras revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminarlo!'
        }).then((result) => {
            if (result.value) {
                fetch('../controllers/eliminarLibroController.php', {
                    method: 'POST',
                    body: form
                })
                    .then(res => res.json())
                    .then((data) => {
                        if (data === 1) {
                            Swal.fire(
                                'Eliminado!',
                                'El libro ha sido eliminado.',
                                'success'
                            )
                            this.listado();
                        } else {
                            Swal.fire(
                                'Error!',
                                'El libro no se elimino.',
                                'error'
                            )
                        }
                    })
                    .catch(err => console.log(err));
            }
        })
    }
    this.abastecer = (id) => {
        var form = new FormData();
        form.append('id', id);
        fetch('../controllers/obtenerLibroController.php', {
            method: 'POST',
            body: form
        })
            .then(res => res.json())
            .then((data) => {
                this.id_libro_a.value = data.id_libro;
                this.isbn_a.value = data.isbn;
                this.titulo_a.value = data.titulo;
                this.stock_a.value = data.stock;
            })
            .catch(err => console.log(err));
    }

    this.registroAbastecer = () => {
        if (this.stock_a_nuevo.value === '' || this.stock_a_nuevo.value <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El stock debe ser mayor a 0.',
            })
        } else {
            var form = new FormData();
            form.append('id_libro', this.id_libro_a.value);
            form.append('stock_actual', this.stock_a.value);
            form.append('stock_nuevo', this.stock_a_nuevo.value);
            fetch('../controllers/abastecerLibroController.php', {
                method: 'POST',
                body: form
            })
                .then(res => res.json())
                .then((data) => {
                    if (data === 1) {
                        Swal.fire(
                            'Abastecido!',
                            'El libro ha sido abastecido.',
                            'success'
                        )
                        this.listado();
                        this.stock_a_nuevo.value = '';
                        document.getElementById('formAbastecer').reset();
                        this.modalCerrar_a.click();
                    } else {
                        Swal.fire(
                            'Error!',
                            'El libro no se abastecio.',
                            'error'
                        )
                    }
                })
                .catch(err => console.log(err));
        }
    }
    this.vender = (id) => {
        var form = new FormData();
        form.append('id', id);
        fetch('../controllers/obtenerLibroController.php', {
            method: 'POST',
            body: form
        })
            .then(res => res.json())
            .then((data) => {
                this.id_libro_v.value = data.id_libro;
                this.isbn_v.value = data.isbn;
                this.titulo_v.value = data.titulo;
                this.stock_v.value = data.stock;
                this.precio_v_v.value = data.precio_v;
                this.stock_v_v.value = data.stock;
            })
            .catch(err => console.log(err));
    }
    this.registroVender = () => {
        let tipo = document.getElementById('tipo_transaccion_v').value;
        if (this.stock_vender_v.value === '' || this.stock_vender_v.value <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El stock debe ser mayor a 0.',
            })
        } else if (this.fecha_v.value === '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La fecha no puede estar vacia.',
            })
        } else if (tipo === '' || tipo === null) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Seleccione un tipo de transaccion.',
            })
        } else {
            var form = new FormData(document.getElementById('formVender'));
            fetch('../controllers/venderLibroController.php', {
                method: 'POST',
                body: form
            })
                .then(res => res.json())
                .then((data) => {
                    if (data === 1) {
                        Swal.fire(
                            'Vendido!',
                            'El libro ha sido vendido.',
                            'success'
                        )
                        this.listado();
                        this.stock_vender_v.value = '';
                        this.fecha_v.value = '';
                        document.getElementById('formVender').reset();
                        this.modalCerrar_v.click();
                    } else {
                        Swal.fire(
                            'Error!',
                            'El libro no se vendio, no existe demasiado stock o superior.',
                            'error'
                        )
                    }
                })
                .catch(err => console.log(err));

        }
    }
    this.tipoTransaccion = () => {
        fetch('../controllers/tipoTransaccionController.php', {
            method: 'GET'
        })
            .then(res => res.json())
            .then((data) => {
                html = [];
                html += "<select class='form-control' name='tipo_transaccion_v' id='tipo_transaccion_v' required>";
                html += "<option selected disabled value=''> Seleccionar...</option>";
                data.forEach(element => {
                    html += "<option value='" + element.id_tipo_transaccion + "'>" + element.nombre + "</option>";
                });
                html += "</select>";
                this.tipo_transaccion.innerHTML = html;
            })
            .catch(err => console.log(err));
    }
    this.reset = () => {
        document.getElementById('formLibro').reset();
        this.imagen.innerHTML = ""
    }
}
app.listado();
app.tipoTransaccion();