require('./bootstrap');

// Example of javascript snippet to ask a confirmation before executing the destroy action
// This js snippet uses the `data-confirm` attribute value provided in the use case example above
const destroyButtons = $('table form.destroy-action button[data-confirm]');
destroyButtons.click((event) => {
    event.preventDefault();
    const $this = $(event.target);
    const $destroyButton = $this.is('button') ? $this : $this.closest('button');
    const message = $destroyButton.data('confirm');
    const form = $destroyButton.closest('form');
    if (message && confirm(message)) {
        form.submit();
    }
});