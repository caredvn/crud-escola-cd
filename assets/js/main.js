const modal = document.getElementById('modal');
const overlay = document.getElementById('overlay');
const modalFechar = document.getElementById('modal-fechar');

function abrirModal(btn) {
    const id = btn.getAttribute('aluno-id');

    fetch(`buscar-aluno.php?id=${id}`)
        .then(response => response.json())
        .then(aluno => {
            if(aluno) {
                document.getElementById("detalhe-nome").innerText = aluno.nome;
                document.getElementById("detalhe-matricula").innerText = aluno.matricula;
                document.getElementById("detalhe-turma").innerText = aluno.turma;
                document.getElementById("detalhe-nota").innerText = aluno.nota;
            }
        });

    modal.setAttribute("open", "true");
    overlay.style.display = "block";
    overlay.style.pointerEvents = "auto"
};

modalFechar.addEventListener("click", () => {
    modal.removeAttribute("open");
    overlay.style.display = "none";
    overlay.style.pointerEvents = "none"
})