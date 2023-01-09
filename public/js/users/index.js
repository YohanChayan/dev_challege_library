console.log('hello users')

function submitRemoveUser(UserID)
{
    const form = document.querySelector('#deleteUsrForm');
    form.setAttribute('action', `users/${UserID}`)
    form.submit();
}