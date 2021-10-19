const closeIcon = document.querySelectorAll('.close-icon');
const updateCloseIcon = document.querySelector('.update-close-icon');
const todo_hidden_id = document.querySelectorAll('#todo__id_field');

const addIcon = document.querySelector('.add-todo-icon');
const modalAdd = document.querySelector('.add-modal');

const delIcon = document.querySelectorAll('.delete-button');
const modalDel = document.querySelector('.delete-modal');

const editIcon = document.querySelectorAll('.edit-button');
const modalUpdate = document.querySelector('.update-modal');

const url = window.location.search;

addIcon.addEventListener('click', () => {
    modalAdd.classList.add('show');
});

delIcon.forEach((button, index) => {
    button.addEventListener('click', () => {
        modalDel.classList.add('show');
        document.querySelector('#hidden_container').innerHTML = todo_hidden_id[index].value;

        document.querySelector('#todo_id_delete').value = document.querySelector('#hidden_container').textContent;
    });
});

// editIcon.forEach((button, index) => {
//     button.addEventListener('click', () => {
//         if (url) {
//             modalUpdate.classList.add('show');
//         }
//     });
// });
if (url) {
    modalUpdate.classList.add('show');
}   

closeIcon.forEach((button) => {
    button.addEventListener('click', () => {
        modalAdd.classList.remove('show');
        modalDel.classList.remove('show');
    });
});

updateCloseIcon.addEventListener('click', () => {
    modalUpdate.classList.remove('show');
    window.location = 'index.php';
});