var app = new function () {
    this.dinero = document.getElementById('dinero');
    this.libros = document.getElementById('libros');
    this.transaccion = document.getElementById('transaccion');
    this.total = () => {
        fetch('../controllers/principalController.php', {
            method: 'GET',
        })
            .then(res => res.json())
            .then((data) => {
                this.dinero.innerHTML = data.dinero;
                this.libros.innerHTML = data.libros;
                this.transaccion.innerHTML = data.transaccion;
            })
            .catch(err => console.log(err));
        $('#myModal2').modal('toggle')
    }
}
app.total();