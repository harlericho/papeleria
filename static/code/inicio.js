var app = new function () {
    this.email = document.getElementsByName('email')[0]
    this.password = document.getElementsByName('password')[0]

    this.inicio = () => {
        var form = new FormData();
        form.append('email', this.email.value);
        form.append('password', this.password.value);
        fetch('../controllers/inicioController.php', {
            method: 'POST',
            body: form,
        })
            .then(res => res.json())
            .then((data) => {
                if (data === 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Inicio exitoso',
                        text: 'Ahora puedes ver tu perfil',
                    })
                    setTimeout(function(){
                        window.location.href = '../views/principal.php'
                    },1000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El correo o la contraseña no coinciden',
                    })
                }
            })
            .catch(err => console.log(err));
    }
}