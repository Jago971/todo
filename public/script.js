deleteButtons = document.querySelectorAll(".delete")
completeButtons = document.querySelectorAll(".complete")

deleteButtons.forEach((button) => {
    button.addEventListener('click', (button) => {deleteTask(button)})
})

completeButtons.forEach((button) => {
    button.addEventListener('click', (button) => {completeTask(button)})
})

function completeTask(e) {
    let id = e.currentTarget.dataset.id;
    const requestOptions = {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: id })
    }
    fetch('http://localhost:8080/taskZ', requestOptions)
        .then(window.location.reload())
}

function deleteTask(e) {
    let id = e.currentTarget.dataset.id;
    const requestOptions = {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ page: 'uncompleted', id: id })
    }
    fetch('http://localhost:8080/taskZ', requestOptions)
        .then(window.location.reload())
}