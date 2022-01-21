$(function () {
    this.mostrarDatosGenerales = () => {
        fetch('../controllers/totalGeneralesController.php', {
            method: 'GET',
        })
            .then(res => res.json())
            .then((response) => {
                Morris.Area({
                    element: 'dataLibro',
                    data: [{
                        period: '2021',
                        precio: null,
                        cantidad: null,
                        libros: null,
                        transacciones: null
                    }, {
                        period: '2022',
                        precio: response.precio,
                        cantidad: response.cantidad,
                        libros: response.libro,
                        transacciones: response.transaccion
                    }, {
                        period: '2023',
                        precio: null,
                        cantidad: null,
                        libros: null,
                        transacciones: null
                    }],
                    xkey: 'period',
                    ykeys: ['precio', 'cantidad', 'libros', 'transacciones'],
                    labels: ['precio', 'cantidad', 'libros', 'transacciones'],
                    pointSize: 2,
                    hideHover: 'auto',
                    resize: true
                });

            })
            .catch(err => console.log(err));
    }
    this.mostrarDatosGenerales();

});
