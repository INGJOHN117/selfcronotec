<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/nodeStile.css">
    <!--<script src="https://kit.fontawesome.com/5658e61838.js"></script>-->
</head>

<body>
    <div id="masterTag">
        <header>
            <div id='divmenu'>
                <button id="btnMenu">MENU</button>
            </div>
            <div id="divnav">
                <nav>
                    <ul id="ulMenu">
                        <img src="img/big3.png">
                        <a name="cronograma" class="page">CRONOGRAMA</a>
                        <a name="nuevoEquipo" class="page">NUEVO EQUIPO</a>
                        <a name="hojaDeVida" class="page">HOJAS DE VIDA</a>
                        <a name="inactivos" class="page">INACTIVOS</a>
                    </ul>
                </nav>
            </div>
        </header>

        <div id="contenedor">
            <div id="cronograma">
                <table id="tableCronograma">
                    <caption>CALENDARIO DE <br><br> MANTENIMIENTO</caption>
                    <tr>
                        <div>
                            <th>Nombre PC</th>
                            <th id="oficinaTH">Oficina</th>
                            <th>Proximo Mantenimiento</th>
                            <th></th>
                        </div>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td id="tdBtn">
                            <div>
                                <button type="submit" class="accept"><i
                                        class="iconAccept fas fa-check-double"></i></button>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script type='module' src='js/main.js'></script>
</body>

</html>