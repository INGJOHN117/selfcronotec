window.onload = login()
import { loadDocument } from './controller';
//import View from './views';

function login() {
    var form = document.getElementById('loginForm');

    form.addEventListener('submit', function(e) {
        /**
         * usando getElement by ID para capturar los datos
         */
        e.preventDefault();
        var formData = new FormData(form)
        if (formData.get('user') == '' || formData.get('password') == '') {
            alert('campos vacios')
            location.href = './login.php'
        } else {
            //debugger
            fetch('./authenticate.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(response => {
                    console.log(response)
                    if (response[0].estado) {
                        console.log(response[0].estado)
                        localStorage.setItem('user', response[0].nombre)
                        localStorage.setItem('cedula', response[0].cedula)
                        localStorage.setItem('documento', 'main')
                        localStorage.setItem('view', 'cronograma')
                        loadDocument('main')
                    } else if (!response[0].estado) {
                        alert(response[0].error)
                        if (localStorage.getItem('user')) {
                            if (localStorage.getItem('cedula')) {
                                console.log(response[0].estado)
                                localStorage.clear()
                            }
                        }
                        loadDocument('login')
                    }
                })
        }
    })
}
/*
form.addEventListener('submit', function(e) {
    //usando getElement by ID para capturar los datos

    e.preventDefault();
    const user = document.getElementById('user').value
    const password = document.getElementById('password').value

    let formData = new FormData();
    formData.append('user', user);
    formData.append('password', password);
    fetch('./authenticate.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(response => {
            console.log(response[0].nombre)

        })
})
*/