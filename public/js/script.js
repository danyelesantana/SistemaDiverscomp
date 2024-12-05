
 const quill = new Quill('#procedimentos-editor', {
    theme: 'snow',
    placeholder: 'Descreva os procedimentos da atividade de maneira detalhada...',
    modules: {
        toolbar: [
            [{ header: [1, 2, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ list: 'ordered' }, { list: 'bullet' }],
            ['link', 'blockquote', 'code-block']
        ]
    }
});


const form = document.querySelector('form');
form.addEventListener('submit', function () {
    const procedimentosInput = document.querySelector('#procedimentos');
    procedimentosInput.value = quill.root.innerHTML;
});

window.onload = function() {
const urlParams = new URLSearchParams(window.location.search);
const msg = urlParams.get('msg');
if (msg === "Atividade cadastrada com sucesso.") {
    alert("Atividade cadastrada com sucesso!");
}
};