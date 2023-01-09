
function toTrashCat(cateID)
{
  
    Swal.fire({
        title: '¿Estas seguro que desea eliminar esta categoría?',
        text: "Esta acción no se puede revertir!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar!',
        cancelButtonText: 'Cancelar!'
      }).then((result) => {
        if (result.isConfirmed) {
            
            if(cateID)
                submitRemoveCat(cateID);
        }
      })
}

function submitRemoveCat(cateID)
{
    const form = document.querySelector('#deleteCatForm');
    form.setAttribute('action', `categories/${cateID}`)
    form.submit();
}