document.addEventListener('DOMContentLoaded', function () {
    const inputBusqueda = document.getElementById('inputBusqueda');
    const tablaDatos = document.getElementById('tablaDatos');
    const rows = tablaDatos.getElementsByTagName('tr');

    inputBusqueda.addEventListener('keyup', function () {
        const searchText = inputBusqueda.value.toLowerCase();

        for (let i = 1; i < rows.length; i++) {
            let found = false;
            const cells = rows[i].getElementsByTagName('input');

            for (let j = 0; j < cells.length; j++) {
                const inputValue = cells[j].value.toLowerCase();

                if (inputValue.includes(searchText)) {
                    found = true;
                    break;
                }
            }

            if (found) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    });
});
