import Component from './component.js';

export function loadDocument(view) {
    /*
    parameters
    view String with name´s document
    */
    //debugger
    console.log(view)
    switch (view) {
        case 'login':
            location.href = './login.php'
            break;
        case 'index':
            location.href = './index.php'
            break;
        case 'main':
            location.href = './main.php'
            break;
        case 'registroSoporte':
            location.href = './registroSoporte.php'
            break;
        default:
            /**
             * VISTA DENEGADO
             */
    }
}

export function loadNode(nameNode, dataJson) {
    var component = new Component(nameNode)
    var nodeHtml = component.makecomponent(nameNode, dataJson)
    return nodeHtml
}

export function beSession() {
    /*
     *retorna true si las sesiones localstorage estan activas
     *retorna false si las sesiones localstorage estas inactivas
     */
    if (localStorage.getItem('user')) {
        if (localStorage.getItem('cedula')) {
            return true;
        }
    }
    return false
}

export async function beSessionServer() {
    /**
     * verifica mendiante peticion al servidor si existe la sesion
     * retorna true si la session existe false en caso contrario
     */
    try {
        var formData = new FormData()
        formData.append('user', localStorage.getItem('user'));
        formData.append('cedula', localStorage.getItem('cedula'));
        const response = await fetch('./authenticate.php', {
            method: 'POST',
            body: formData
        })
        const data = await response.json()
        if (data[0].estado) {
            console.log('validacion exitosa, el usuario a sido validado en el servidor')
            return true
        } else {
            console.log('usario no valido quiebre de seguridad')
            return false
        }
    } catch (error) {
        console.log('error en servidor no se pudo autentificar')
        return false
    }

}

export async function getData(...dataNeeds) {
    /**
     * Metodo que  gestiona datos al servidor  mediante una peticion 
     * http 
     * recibe como parametro un array (dataNeeds) en [<<nombre del nodo>>,<<tabla 1>>,<<tabla 2>>,...]
     * 
     *  */
    //console.log(dataNeeds)
    //debugger
    try {
        var formData = new FormData()
        formData.append('dataNeeds', dataNeeds);
        formData.append('user', localStorage.getItem('user'));
        formData.append('cedula', localStorage.getItem('cedula'));
        const response = await fetch('./getData.php', {
            method: 'POST',
            body: formData
        })
        const data = await response.json()
        return data
    } catch (error) {
        //debugger
        console.log(error)
        return [{ "error": "NO HAY DATOS PARA MOSTRAR", "estado": false, "descripcion": error }]
    }
    /*
    var formData = new FormData()
    formData.append('nameNode', nameNode.toString());
    formData.append('user', localStorage.getItem('user').toString());
    formData.append('cedula', localStorage.getItem('cedula').toString());
    const response = await fetch('./getData.php', {
        method: 'POST',
        body: formData
    })
    const data = await response.json()
    return data
    */

}

export async function setData(formData, ...tableObjective) {
    /**
     * metodo que envia datos al servidor mediante una peticion http en un formData
     * 
     * formData: es el cumulo de datos en forma de "formData" que sera registrado en servidor
     * tableObjective: nombre de las tablas en la que se desea registrar el cumulo de datos
     *
     * 
     * return (json): el valor de retorno lo determina el servidor aunque siempre debera ser en formato json
     * de lo contrario se determina un error
     * 
     */
    try {
        formData.append('tableObjective', tableObjective)
        formData.append('user', localStorage.getItem('user'));
        formData.append('cedula', localStorage.getItem('cedula'));
        const response = await fetch('./setData.php', {
            method: 'POST',
            body: formData
        })
        const data = await response.json()
        return data
    } catch (error) {
        debugger
        console.log(error)
        return [{ "error": "NO HAY DATOS PARA MOSTRAR", "estado": false, "descripcion": error }]
    }
}