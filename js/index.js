window.onload = main();
import { beSessionServer, beSession, loadDocument } from './controller.js';

function main() {
    //debugger
    if (!beSession()) {
        console.log('no se inicio sesion')
        loadDocument('login')
    } else if (beSessionServer()) {
        if (localStorage.getItem('view')) {
            loadDocument(localStorage.getItem('documento'))
        } else {
            loadDocument('login')
        }
    }
}