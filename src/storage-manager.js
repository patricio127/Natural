const guardarEnLS = function(listaProductos) {
    localStorage.listaProductos = JSON.stringify(listaProductos);
};
const leerLS = function() {
    if (!localStorage.listaProductos) {
        guardarEnLS([]);
    }
    return JSON.parse(localStorage.listaProductos);
};

const StorageManager = {
    guardarEnLS, 
    leerLS,
}

export default StorageManager;