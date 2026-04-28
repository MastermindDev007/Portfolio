const sidebar = document.querySelector('[data-admin-sidebar]');
const sidebarToggle = document.querySelector('[data-admin-sidebar-toggle]');

if (sidebar && sidebarToggle) {
    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('open');
    });
}

const collectionForm = document.querySelector('[data-collection-form]');

if (collectionForm) {
    const list = collectionForm.querySelector('[data-collection-list]');
    const addRowButton = collectionForm.querySelector('[data-add-row]');
    const template = collectionForm.querySelector('[data-row-template]');

    const getNextIndex = () => {
        const rows = list ? list.querySelectorAll('[data-row-item]') : [];
        return rows.length;
    };

    const getNextId = () => {
        if (!list) return 1;
        const ids = Array.from(list.querySelectorAll('.id-input'))
            .map((input) => Number.parseInt(input.value || '0', 10))
            .filter((value) => Number.isFinite(value));
        return ids.length ? Math.max(...ids) + 1 : 1;
    };

    const bindRemoveButtons = () => {
        if (!list) return;
        list.querySelectorAll('[data-remove-row]').forEach((button) => {
            if (button.dataset.bound === '1') return;
            button.dataset.bound = '1';
            button.addEventListener('click', () => {
                const row = button.closest('[data-row-item]');
                if (row) row.remove();
            });
        });
    };

    bindRemoveButtons();

    if (addRowButton && template && list) {
        addRowButton.addEventListener('click', () => {
            const index = getNextIndex();
            const html = template.innerHTML.replace(/__INDEX__/g, String(index));
            const wrapper = document.createElement('div');
            wrapper.innerHTML = html.trim();
            const row = wrapper.firstElementChild;
            if (!row) return;

            const idInput = row.querySelector('.id-input');
            if (idInput && !idInput.value) {
                idInput.value = String(getNextId());
            }

            list.appendChild(row);
            bindRemoveButtons();
        });
    }
}
