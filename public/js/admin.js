document.addEventListener('DOMContentLoaded', () => {
    const addDishForm = document.getElementById('add-dish-form');
    const dishList = document.getElementById('dish-list');

    addDishForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const dishName = document.getElementById('dish-name').value;
        const dishDescription = document.getElementById('dish-description').value;
        const dishImage = document.getElementById('dish-image').value;

        fetch('../src/add_dish.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `nombre=${dishName}&descripcion=${dishDescription}&imagen=${dishImage}`
        }).then(response => response.json()).then(data => {
            if (data.success) {
                alert('Plato agregado con éxito');
                const newDish = document.createElement('div');
                newDish.innerHTML = `<h3>${dishName}</h3><p>${dishDescription}</p><img src="${dishImage}" alt="${dishName}"><button class="delete-dish" data-id="${data.id}">Eliminar</button>`;
                dishList.appendChild(newDish);
            } else {
                alert('Error al agregar el plato');
            }
        });
    });

    dishList.addEventListener('click', (e) => {
        if (e.target.classList.contains('delete-dish')) {
            const dishId = e.target.getAttribute('data-id');
            fetch('../src/remove_dish.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `id=${dishId}`
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    e.target.parentElement.remove();
                    alert('Plato eliminado con éxito');
                } else {
                    alert('Error al eliminar el plato');
                }
            });
        }
    });
});
