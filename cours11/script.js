/*let postIts = [
    {id: 1, title: "Réunion d'équipe", content: "N'oubliez pas la réunion demain à 10h dans la salle de conférence."},
    {id: 2, title: "Rappel de projet",content: "La date limite pour le projet X est le 15 mars."},
    {id: 3, title: "Anniversaire de Laura",content: "C'est l'anniversaire de Laura le 22 mars. Penser à acheter un cadeau."},
    {id: 4,title: "Rendez-vous chez le dentiste",content: "Rendez-vous chez le dentiste le 20 mars à 14h30."},
    {id: 5,title: "Réunion avec le client",content: "Réunion avec le client XYZ le 25 mars à 11h."},
    {id: 6,title: "Rapport mensuel",content: "Préparer le rapport mensuel pour la réunion du 30 mars."},
    {id: 7,title: "Sortie d'équipe",content: "Sortie d'équipe prévue le premier avril. Lieu à déterminer."},
    {id: 8,title: "Mise à jour logicielle",content: "Mettre à jour le logiciel de gestion de projet avant le 10 avril."},
    {id: 9,title: "Appel conférence",content: "Appel conférence avec l'équipe de développement le 5 avril à 16h."},
    {id: 10,title: "Formation en ligne",content: "Commencer la formation en ligne sur les nouvelles technologies le 7 avril."}
];*/


function renderPostIts() {
    const container = document.querySelector('.postit-container');
    container.innerHTML = '';
    postIts.forEach(postIt => {
        container.innerHTML += `
            <div class="postit" data-id="${postIt.id}">
                <h3>${postIt.title}</h3>
                <p>${postIt.content.replace(/\n/g,"<br>")}</p>
                <button class="editBtn btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="deleteBtn btn btn-sm btn-danger">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        `;
    });
    attachEventListeners();
}

function attachEventListeners() {
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', function() {
            const postItId = this.parentElement.getAttribute('data-id');
            const postIt = postIts.find(p => p.id == postItId);
            document.getElementById('editId').value = postIt.id;
            document.getElementById('editTitle').value = postIt.title;
            document.getElementById('editContent').value = postIt.content;
            $('#editModal').modal('show');
        });
    });

    document.querySelectorAll('.deleteBtn').forEach(btn => {
        btn.addEventListener('click', function() {
            if (confirm('Êtes-vous sûr de vouloir supprimer ce post-it ?')) {
                const postItId = this.parentElement.getAttribute('data-id');
                postIts = postIts.filter(p => p.id != postItId);
                renderPostIts();
            }
        });
    });

}

$( document ).ready(function() {

    document.getElementById('editPostItForm').addEventListener('submit', e => {
        e.preventDefault();
        const id = document.getElementById('editId').value;
        const title = document.getElementById('editTitle').value;
        const content = document.getElementById('editContent').value;
        const postItIndex = postIts.findIndex(p => p.id == id);
        postIts[postItIndex] = { id, title, content };
        $('#editModal').modal('hide');
        renderPostIts();
    });

    document.getElementById('createPostItForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const title = document.getElementById('createTitle').value;
        const content = document.getElementById('createContent').value;
        const maxId = postIts.reduce(function(prev, current) {
            return (prev && prev.id > current.id) ? prev : current
        })
        
        postIts.push({id: maxId.id+1, title: title, content:content})
    
        $('#createModal').modal('hide');
        document.getElementById('createTitle').value = '';
        document.getElementById('createContent').value = ''
        renderPostIts();
    });

    $('.close').each(function() {
        $(this).click(function() {
            $('#editModal').modal('hide');
            $('#createModal').modal('hide');
        });
    });

    document.getElementById('showFormBtn').addEventListener('click', function() {
        $('#createModal').modal('show');
    });

    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        document.querySelectorAll('.postit').forEach(postit => {
            const title = postit.querySelector('h3').textContent.toLowerCase();
            const content = postit.querySelector('p').textContent.toLowerCase();
            if (title.includes(searchTerm) || content.includes(searchTerm)) {
                postit.style.display = '';
            } else {
                postit.style.display = 'none';
            }
        });
    });
    
    renderPostIts();    
});




