console.log('hello');

function submitBook(event)
{
    event.preventDefault();
    
    const categoriesTBody_children = document.querySelector('#tBodyCategories').children;
    const hiddenCategory = document.querySelector('#_category');

    const hiddenCategory_array = []

    for (const item of categoriesTBody_children) {
        
        const td_content = item.children[0];
        const content = td_content.children[0].innerText;

        console.log(content)

        hiddenCategory_array.push(content)

    }

    hiddenCategory.value = hiddenCategory_array.join(', ');

    // document.querySelector('#form').submit();
    event.target.submit();
}

function removeCate(tag)
{
    tr_parent = tag.closest('tr');
    console.log('tr_parent')
    tr_parent.remove();
}


function AddCheckCategory(inputCategory)
{
    console.log(inputCategory)
    if(inputCategory.value === '' || !inputCategory.checkValidity()) {
        inputCategory.classList.add('is-invalid')
        return;
    }else
        inputCategory.classList.remove('is-invalid')

    addCategory(inputCategory.value)
}

function addCategory(inputCategoryValue)
{
    // const inputCategory = document.querySelector('#category');
    
    console.log(inputCategoryValue)
    // if(inputCategory.value === '' || !inputCategory.checkValidity()) {
    //     inputCategory.classList.add('is-invalid')
    //     return;
    // }else
    //     inputCategory.classList.remove('is-invalid')
    

    const CategoriesTBody = document.querySelector('#tBodyCategories');
    const tr = document.createElement('tr');
    tr.id = `cate-${CategoriesTBody.children.length + 1}`;
    const td1 = document.createElement('td')
    td1.classList.add('text-center');
    
    const h5 = document.createElement('h5');
    h5.classList.add('text-secondary');
    h5.innerText = inputCategoryValue

    td1.append(h5);
    
    const td2 = document.createElement('td')
    td2.classList.add('text-center');
    const a = document.createElement('a');
    a.classList.add('btn','btn-danger')
    a.onclick = () =>{ removeCate(a) }

    const i = document.createElement('i');
    i.classList.add('fa-xs', 'fas', 'fa-trash');
    a.append(i);
    td2.append(a)
    tr.append(td1,td2);

    CategoriesTBody.append(tr)

    document.querySelector('#category').value = '';

}

function loadBookCategories(categories)
{
    console.log('load book categories')
    console.log(categories) //str with '|' delimiter
    console.log('categories.split(",")') 
    console.log(categories.split(",")) 

    const catArray = categories.split(",")

    for (const item of catArray) {
        addCategory(item)
    }



}
