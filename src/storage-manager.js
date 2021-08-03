//const API_PATH = "http://localhost/www/adm";
const API_PATH = "https://veggie-shop.000webhostapp.com";
const guardarEnLS = function(listaProductos) {
    localStorage.listaProductos = JSON.stringify(listaProductos);
};
const leerLS = function() {
    if (!localStorage.listaProductos) {
        guardarEnLS([]);
    }
    return JSON.parse(localStorage.listaProductos);
};
const leerBD = function() {
    return fetch(`${API_PATH}/Natural/api/todos.php`).then((response)=>{
        if(response.ok){
            return response.json();
        }
    });
}
const crearFormData = function(producto) {
    var formData = new FormData();
    var fileField = document.querySelector("input[type='file']");
    formData.append('codigo', producto.codigo);
    if (fileField && fileField.files && fileField.files.length > 0) {
        formData.append('imagen', fileField.files[0]);
    }
    formData.append('nombre', producto.nombre);
    formData.append('descripcion', producto.descripcion);
    formData.append('precio', producto.precio);
    formData.append('categoria', producto.categoria);
    return formData;
}
const guardarEnBD = function(producto) {
    const formData = crearFormData(producto);
    let respuesta = fetch(`${API_PATH}/Natural/api/guardar.php`, {
        method:'POST',
        body:formData,
    })
    return respuesta;
}
const leerPendientesDeLS = function(){
    let pendientes = JSON.parse(localStorage.pendientes || "{}");
    return pendientes;
}
const leerPendientesEliminarDeLS = function(){
    let pendientesEliminar = JSON.parse(localStorage.pendientesEliminar || "[]");
    return pendientesEliminar;
}
const resetPendientes = function() {
    localStorage.pendientes = JSON.stringify({});
}
const resetPendientesEliminar = function() {
    localStorage.pendientesEliminar = JSON.stringify([]);
}
const guardarPendienteEnLS = function(producto) {
    let pendientes = leerPendientesDeLS();
    pendientes[producto.codigo] = producto;
    localStorage.pendientes = JSON.stringify(pendientes);
}
const guardarPendienteEliminarEnLS = function(producto) {
    let pendientesEliminar = leerPendientesEliminarDeLS();
    pendientesEliminar.push(producto.codigo);
    localStorage.pendientesEliminar = JSON.stringify(pendientesEliminar);
}

const eliminarDeBD = function(producto) {
    var formData = new FormData();
    formData.append('codigo', producto.codigo);
    const respuesta = fetch(`${API_PATH}/Natural/api/eliminar.php`, {
        method: 'POST',
        body: formData,
    });
    return respuesta;
}
const hayDataPendiente = function(){
    return leerPendientesEliminarDeLS().length > 0 || Object.keys(leerPendientesDeLS()).length > 0;
}
const actualizarBDConDataOffline = function() {
    console.log('dentro de actualizar BD con data offline');
    let promesas = [];
    let pendientes = leerPendientesDeLS();
    Object.keys(pendientes).forEach(codigo => {
        const producto = pendientes[codigo];
        const resultado = guardarEnBD(producto);
        promesas.push(resultado);
    });
    let pendientesEliminar = leerPendientesEliminarDeLS();
    pendientesEliminar.forEach(codigo => {
        const resultado = eliminarDeBD({codigo: codigo});
        promesas.push(resultado);
    });
    resetPendientes();
    resetPendientesEliminar();
    return Promise.all(promesas);
}

const guardarReview = function(rating, text){
    console.log('guardarReview');
    var formData = new FormData();
    formData.append('rating', rating);
    formData.append('text', text);

    let respuesta = fetch(`${API_PATH}/Natural/api/guardar_review.php`, {
        method:'POST',
        body:formData,
    })
    return respuesta;
}

const StorageManager = {
    guardarEnLS, 
    leerLS,
    leerBD,
    guardarEnBD,
    eliminarDeBD,
    leerPendientesDeLS,
    guardarPendienteEnLS,
    leerPendientesEliminarDeLS,
    guardarPendienteEliminarEnLS,
    actualizarBDConDataOffline,
    hayDataPendiente,
    guardarReview,
    API_PATH,
}

export default StorageManager;