/*export function otro() {
    alert('las funciones se exportan con la palabra reservada export');
}

export default class Mensaje {
    constructor() {
        alert('las clases de exportan con la palabra reservada export default');
    }
}
*/

export class Sistemas {
    constructor(cedula, nombre, apellido, proceso, firma, password) {
        this.cedula = cedula;
        this.nombre = nombre;
        this.apellido = apellido;
        this.proceso = proceso;
        this.firma = firma;
        this.password = password;
    }


    getCedula() {
        return this.cedula
    }

    setCedula(cedula) {
        this.cedula = cedula;
    }

    getNombre() {
        return this.nombre
    }

    setNombre(nombre) {
        this.nombre = nombre;
    }

    getApellido() {
        return this.apellido;
    }

    setApellido(apellido) {
        this.apellido = apellido;
    }

    getProceso() {
        return this.proceso;
    }

    setProceso(proceso) {
        this.proceso = proceso;
    }

    getFirma() {
        return this.firma;
    }

    setFirma(firma) {
        this.firma = firma;
    }

    getPassword() {
        return this.password;
    }

    setPassword(password) {
        this.password = password;
    }

    toString() {
        return "[" + this.cedula + "//" + this.nombre + "//" + this.apellido + "]";
    }


}

/*
export default class Aplication {  
}*/