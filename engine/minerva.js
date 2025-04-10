jQuery(document).ready(function ($) {
    // creator UI
    $("#minerva-blocks").click(function () {
        $("#minerva-allblocks").slideToggle();
    });

    // MODALS
    minervaModal();
});

function minervaModal() {
    let elements = document.querySelectorAll("#minerva-stage div");
    elements.forEach(element => {
        element.addEventListener("click", function() {
            let newText = prompt("contentxx:", this.innerHTML);
            if (newText !== null) {
                this.innerHTML = newText;
            }
        });
    });
}

document.addEventListener("DOMContentLoaded", function() {

    let blocks = document.querySelectorAll(".draggable-block");
    let editor = document.getElementById("minerva-stage");

    // Permitir soltar elementos no editor
    editor.addEventListener("dragover", function(e) {
        e.preventDefault();
    });

    editor.addEventListener("drop", function(e) {
        e.preventDefault();
        let content = e.dataTransfer.getData("text/html");
        let newElement = document.createElement("div");
        newElement.innerHTML = content;

        // Permitir edição ao clicar
        newElement.addEventListener("click", function() {
            let newText = prompt("Editar conteúdo:", this.innerHTML);
            if (newText !== null) {
                this.innerHTML = newText;
            }
        });

        editor.appendChild(newElement);
    });

    // Adicionar evento de arrastar para os blocos
    blocks.forEach(block => {
        block.addEventListener("dragstart", function(e) {
            e.dataTransfer.setData("text/html", this.getAttribute("data-content"));
        });
    });

    // Salvar o conteúdo do editor
    document.getElementById("minerva-go").addEventListener("click", function() {
        let content = editor.innerHTML;

        // Enviar via AJAX
        let data = {
            action: "save_minerva_content",
            content: content,
            post_id: minervaData.post_id,
            nonce: minervaData.nonce
        };

        // Enviar a requisição AJAX
        fetch(minervaData.ajax_url, {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: new URLSearchParams(data)
        })
            .then(response => response.json())
            .then(data => {
            if (data.success) {
                alert("Conteúdo salvo com sucesso!");
            } else {
                alert("Erro ao salvar o conteúdo.");
            }
        });
    });
});
