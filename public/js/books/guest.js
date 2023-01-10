console.log('hello guests')

function notifyme(bookID)
{
    document.querySelector('#book').value = bookID
    $('#InsertGuestDataModal').modal('show');
}