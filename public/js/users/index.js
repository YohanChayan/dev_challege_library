
function toTrashUser(userID)
{
    Swal.fire({
        title: '¿Estas seguro que desea eliminar este Usuario?',
        text: "Esta acción no se puede revertir!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar!',
        cancelButtonText: 'Cancelar!'
      }).then((result) => {
        if (result.isConfirmed) {
            
            if(userID)
                submitRemoveUser(userID);
        }
      })

}


function submitRemoveUser(UserID)
{
    const form = document.querySelector('#deleteUsrForm');
    form.setAttribute('action', `users/${UserID}`)
    form.submit();
}