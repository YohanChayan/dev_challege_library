console.log('hello')


function submitRemoveCat(catID)
{
    const form = document.querySelector('#deleteCatForm');
    form.setAttribute('action', `categories/${catID}`)
    form.submit();

}