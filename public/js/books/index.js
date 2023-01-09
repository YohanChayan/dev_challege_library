console.log('hello books')

function submitRemoveBook(bookID)
{
    const form = document.querySelector('#deleteBookForm');
    form.setAttribute('action', `books/${bookID}`)
    form.submit();
}