var formModal,
vanillaDT,
modal,
memberForm;
document.addEventListener('DOMContentLoaded', () => {
    /**
     * Initialize Vanilla JS DataTabale
     */
    var dt_option = {
        columns: [{
            select : 3 ,
            render: function(data){
                return data.replaceAll(/\n\r/gi,'<br>');
            }
        },{
            select : 4 ,
            render: function(data){
                return `<div class="text-center">
                            <button class="btn btn-outline-primary btn-sm rounded-0" type="button" onclick="edit_member(${data})">
                                <i class="fa-solid fa-edit" title="Editar Usuario"></i>
                            </button>
                            <button class="btn btn-outline-danger btn-sm rounded-0" type="button" onclick="delete_member(${data})">
                                <i class="fa-solid fa-trash" title="Eliminar Usuario"></i>
                            </button>
                        <div class="text-center">
                        `;
            }
        }],
        ajax:'api.php?action=get_data'
    }
    vanillaDT = new DataTable('#memberTable',dt_option)

    /**
     * Form Modal
     */
    modal = document.getElementById('memberFormModal')
    formModal = new bootstrap.Modal('#memberFormModal', {
        backdrop :'static'
    })
    memberForm = document.getElementById('member-form')

    document.getElementById('add_new').addEventListener('click', function(){
        modal.querySelector('.modal-title').innerText = `Agregar Nuevo Usuario`
        formModal.show()
    })
    modal.addEventListener('hide.bs.modal', function(){
        memberForm.reset()
    })


    /**
     * Form Submission
     */

     memberForm.addEventListener('submit', (e) => {
        e.preventDefault()
        var formData = new FormData(memberForm)
        modal.querySelectorAll('.btn, button').forEach( el => { el.setAttribute('disabled',true) } )
        fetch('api.php?action=save_member', {
            method: 'POST',
            body: formData
        }).then(resp=>{
            return resp.json();
        }).then(data => {
            if(!!data.status){
                if(data.status == 'success'){
                    alert(`Los datos del usuario se han guardado correctamente.`);
                        vanillaDT.destroy()
                        vanillaDT.init()
                }else if(!!data.error){
                    alert("Error al guardar los datos del usuario debido a algún error.");
                    console.log(data.error)
                }else{
                    alert("Error al guardar los datos del usuario debido a algún error.");
                }

            }else{
                alert("Error al guardar los datos del usuario debido a algún error.");
            }
            modal.querySelectorAll('.btn, button').forEach( el => { el.removeAttribute('disabled') } )
            formModal.hide();
        }).catch((error) => {
            console.error(error)
            modal.querySelectorAll('.btn, button').forEach( el => { el.removeAttribute('disabled') } )
        });
     })
    
} )

/**
 * Edit Member Function
 * @param {*} $id 
 */

function edit_member($id=0){
    var formData = new FormData();
    formData.append('id', $id)
    fetch('api.php?action=get_single',{
        method:'POST',
        body:formData
    })
    .then(resp => {
        return resp.json();
    })
    .then(data => {
        if(!!data.status){
            if(data.status == 'success'){
                memberForm.querySelector('input[name="id"]').value = data.data.id
                memberForm.querySelector('input[name="name"]').value = data.data.name
                memberForm.querySelector('input[name="contact"]').value = data.data.contact
                memberForm.querySelector('textarea[name="address"]').value = data.data.address
                modal.querySelector('.modal-title').innerText = "Editar Información del Usuario";
                formModal.show()
            }else if(!!data.error){
                alert("Error al obtener datos.")
                console.error(data.error)
            }else{
                alert("Error al obtener datos.")
                console.error(data)
            }
        }else{
            alert("Error al obtener datos.")
                console.error(data)
        }
        
    })
    .catch(error=>{
        console.log (error)
        alert("Error al obtener datos.")
    })
}

/**
 * Delete Member
 * @param {*} $id 
 * @returns 
 */

function delete_member($id=0){
    if(confirm(`¿Deseas eliminar a este usuario?`) === false)
    return false;
    var formData = new FormData();
    formData.append('id', $id)
    fetch('api.php?action=delete_member',{
        method:'POST',
        body:formData
    })
    .then(resp => {
        return resp.json();
    })
    .then(data => {
        if(!!data.status){
            if(data.status == 'success'){
                alert("El usuario ha sido eliminado con éxito.");
                vanillaDT.destroy();
                vanillaDT.init();
            }else if(!!data.error){
                alert("Error al obtener datos.")
                console.error(data.error)
            }else{
                alert("Error al obtener datos.")
                console.error(data)
            }
        }else{
            alert("Error al obtener datos.")
                console.error(data)
        }
        
    })
    .catch(error=>{
        console.log(error)
        alert("Error al obtener datos.")
    })
}
