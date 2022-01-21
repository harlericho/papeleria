var app = new function () {
    this.tablaTransaccion = document.getElementById('tablaTransaccion');

    this.listadoTransaccion = () => {
        fetch('../controllers/listadoTransaccionController.php', {
            method: 'GET',
        })
            .then(res => res.json())
            .then((data) => {
                html = [];
                html += "<table class='table'>";
                html += "<thead><tr>";
                html += "<th>ISBN</th>";
                html += "<th>Imagen</th>";
                html += "<th>Descripción del Libro</th>";
                html += "<th>Descripción de la venta</th>";
                html += "</tr></thead><tbody>"
                data.forEach(element => {
                    html += "<tr>";
                    html += "<td style='color:blue'><big>" + element.isbn + "</big></td>";
                    html += "<td><img src='../static/uploads/" + element.imagen + "' width='100' height='100'></td>";
                    html += "<td><strong><b> Titulo: <i style='color:green'>" + element.titulo + "</i></b></strong><br><b>Precio venta: <i style='color:brown'>" + element.precio_adquirido + "</i></b></td>";
                    html += "<td><b> <i>Cantidad vendida: <i style='color:green'>" + element.cantidad + "</i></i></b><br><b>Precio compra: <i style='color:blue'>" + element.precio + "</i></b><br><b>Fecha: <i style='color:brown'>" + element.fecha + "</i> </b><br><b>Forma de pago: <i style='color:purple'>"+element.nombre+"</i></b></td>";
                })
                html += "</tr></tbody></table>";
                this.tablaTransaccion.innerHTML = html;
            })
            .catch(err => console.log(err));
    }
}
app.listadoTransaccion();