"use strict"

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formAuth');
    form.addEventListener('submit', formSend);

    async function formSend(e) {
        e.preventDefault();
    }
});