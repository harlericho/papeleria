var app = new function () {
    this.nombres = document.getElementsByName('nombres')[0]
    this.email = document.getElementsByName('email')[0]
    this.password = document.getElementsByName('password')[0]
    this.password2 = document.getElementsByName('password2')[0]

    this.registro = () => {
        var form = new FormData();
        form.append('nombres', this.nombres.value);
        form.append('email', this.email.value);
        form.append('password', this.password2.value);

        if (this.password2.value != this.password.value) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Las contraseñas no coinciden',
            })
        } else {
            fetch('../controllers/registroController.php', {
                method: 'POST',
                body: form,
            })
                .then(res => res.json())
                .then((data) => {
                    if (data === 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registro exitoso',
                            text: 'Ahora puedes iniciar sesión',
                        })
                        this.limpiar()
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'El correo ya existe',
                        })
                    }
                })
                .catch(err => console.log(err));
        }
    }
    this.limpiar = () => {
        this.nombres.value = ''
        this.email.value = ''
        this.password.value = ''
        this.password2.value = ''
    }
}