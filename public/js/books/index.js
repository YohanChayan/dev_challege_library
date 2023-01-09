
function toTrashBook(bookID)
{
    Swal.fire({
        title: '¿Estas seguro que desea eliminar este libro?',
        text: "Esta acción no se puede revertir!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar!',
        cancelButtonText: 'Cancelar!'
      }).then((result) => {
        if (result.isConfirmed) {
            
            if(bookID)
                submitRemoveBook(bookID);
        }
      })

}

function submitRemoveBook(bookID)
{
    const form = document.querySelector('#deleteBookForm');
    form.setAttribute('action', `books/${bookID}`)
    form.submit();
}

function submitReturnBookForm(bookID)
{
    const form = document.querySelector('#returnBookForm');
    document.querySelector('#Returnbook_id').value = bookID;
    form.submit();
}

