
var item = document.getElementById('cajaitem');
const contador = 1;


item.addEventListener('click',()=>{

    var fila2 = document.createElement('tr');
    fila2.setAttribute("id", "fila1");
    var NewFil = document.getElementById("fila1");
    NewFil.insertAdjacentElement("afterend", fila2);


    var col2 = document.createElement('td');
    col2.setAttribute("id", "col1");
    col2.setAttribute("class", "border-buttom border-info");
    var Newcol2 = document.getElementById("fila2");
    Newcol2.insertAdjacentElement("beforeend", col2);

    var idp = document.createElement('input');
    idp.setAttribute("type", "number");
    idp.setAttribute("class", "border-0 mt-2 col-9 p-0 bg-light")
    idp.setAttribute("value", "6548");
    idp.setAttribute("disabled", "");
    idp.setAttribute("title", "Identificador del producto");
    var NewFil2 = document.getElementById("col1");
    NewFil2.insertAdjacentElement("beforeend", idp);

    // segunda columna
    var col3 = document.createElement('td');
    col3.setAttribute("id", "col2");
    col3.setAttribute("class", "border-buttom border-info");
    var Newcol3 = document.getElementById("col1");
    Newcol3.insertAdjacentElement("afterend", col3);

    var producto = document.createElement('input');
    producto.setAttribute("type", "text");
    producto.setAttribute("class", "form-control border bg-light")
    producto.setAttribute("list", "datalistOptions");
    producto.setAttribute("title", "Selecciona un producto");
    var NewFil3 = document.getElementById("col2");
    NewFil3.insertAdjacentElement("beforeend", producto);

    // tercera columna
    var col4 = document.createElement('td');
    col4.setAttribute("id", "col3");
    col4.setAttribute("class", "border-buttom border-info");
    var Newcol4 = document.getElementById("col2");
    Newcol4.insertAdjacentElement("afterend", col4);

    var cantidad = document.createElement('input');
    cantidad.setAttribute("type", "number");
    cantidad.setAttribute("class", "form-control border bg-light")
    cantidad.setAttribute("title", "Ingresa una cantidad");
    var NewFil4 = document.getElementById("col3");
    NewFil4.insertAdjacentElement("beforeend", cantidad);

    // cuarta columna
    var col5 = document.createElement('td');
    col5.setAttribute("id", "col4");
    col5.setAttribute("class", "border-buttom border-info");
    var Newcol5 = document.getElementById("col3");
    Newcol5.insertAdjacentElement("afterend", col5);

    var valoru = document.createElement('input');
    valoru.setAttribute("type", "text");
    valoru.setAttribute("value", "$");
    valoru.setAttribute("disabled", "");
    valoru.setAttribute("class", "border-0 mt-2 col-9 p-0 bg-light")
    valoru.setAttribute("title", "Valor por unidad del producto");
    var Newcol5 = document.getElementById("col4");
    Newcol5.insertAdjacentElement("beforeend", valoru);

// quinta columna
    var col6 = document.createElement('td');
    col6.setAttribute("id", "col5");
    col6.setAttribute("class", "border-buttom border-info");
    var Newcol6 = document.getElementById("col4");
    Newcol6.insertAdjacentElement("afterend", col6);

    var valort = document.createElement('input');
    valort.setAttribute("type", "text");
    valort.setAttribute("value", "$ =");
    valort.setAttribute("disabled", "");
    valort.setAttribute("class", "border-0 mt-2 col-9 p-0 bg-light")
    valort.setAttribute("title", "total de la cantidad por el valor del producto");
    var Newcol6 = document.getElementById("col5");
    Newcol6.insertAdjacentElement("beforeend", valort);

    // sexta columna
    var col6 = document.createElement('td');
    col6.setAttribute("id", "col6");
    col6.setAttribute("class", "border-buttom border-info");
    var Newcol6 = document.getElementById("col5");
    Newcol6.insertAdjacentElement("afterend", col6);

    var valort = document.createElement('a');
    valort.setAttribute("name", "Quit");
    valort.textContent = "Quit";
    valort.setAttribute("class", "btn btn-sm btn-danger me-1");
    valort.setAttribute("title", "Quitar producto");
    var Newcol6 = document.getElementById("col6");
    Newcol6.insertAdjacentElement("beforeend", valort);

    var valort = document.createElement('a');
    valort.setAttribute("name", "Edit");
    valort.textContent = "Edit";
    valort.setAttribute("class", "btn btn-sm btn-warning")
    valort.setAttribute("title", "Editar producto");
    var Newcol6 = document.getElementById("col6");
    Newcol6.insertAdjacentElement("beforeend", valort);

    contador + 1;


});


function Saludo(){
    alert('hola');
    };





