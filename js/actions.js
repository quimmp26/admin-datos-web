function mostrarFormAdd() {
    document.getElementById("form_add").style.display = 'block';
    document.getElementById("form_edit").style.display = 'none';
    document.getElementById("form_delete").style.display = 'none';
}

function mostrarFormEdit() {
    document.getElementById("form_edit").style.display = 'block';
    document.getElementById("form_add").style.display = 'none';
    document.getElementById("form_delete").style.display = 'none';

}


function mostrarFormDelete() {
    document.getElementById("form_delete").style.display = 'block';
    document.getElementById("form_add").style.display = 'none';
    document.getElementById("form_edit").style.display = 'block';
}


