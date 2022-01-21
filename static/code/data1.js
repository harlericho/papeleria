
//Flot Pie Chart
$(function () {
    this.mostrarTipoTransaccion = () => {
        fetch('../controllers/totalTipoController.php', {
            method: 'GET',
        })
            .then(res => res.json())
            .then((response) => {
                var data = [{
                    label: "Efectivo",
                    data: response.efectivo
                }, {
                    label: "Tarjeta",
                    data: response.tarjeta
                }, {
                    label: "Transferencia",
                    data: response.transferencia
                }];

                var plotObj = $.plot($("#dataTransaccion"), data, {
                    series: {
                        pie: {
                            show: true
                        }
                    },
                    grid: {
                        hoverable: true
                    },
                    tooltip: true,
                    tooltipOpts: {
                        content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                        shifts: {
                            x: 20,
                            y: 0
                        },
                        defaultTheme: false
                    }
                });
            })
            .catch(err => console.log(err));

    }
    this.mostrarTipoTransaccion();


});
