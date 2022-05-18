const items = document.querySelectorAll( '.person_frontend_container' );
const personsContents = document.querySelectorAll( '.person_container_content' );
const modals = document.querySelectorAll( '.modal' );

const moItems = [...items];
const personsArr = [...personsContents];
const modalsArr = [...modals];

const openModal = () => {
    personsArr.map(person => {
    
        person.addEventListener('click', (e) => {
    
            const currentModal = e.target.closest('.person_frontend_container')
            if(currentModal) {
                let theCurrentModal = currentModal.querySelector('.mo_person_modal');
                if(!theCurrentModal.classList.contains('active')) {
                    theCurrentModal.classList.add('active');
                }
    
            }
    
        })
    
    })
}
openModal();

const closeModal = () => {
    document.addEventListener('click', (e) => {
        const checkModal = e.target.closest('.person_frontend_container');

        if(checkModal) {
            const currentOpenedModal = e.target.closest('.modal-content');
    
            if(e.target?.closest('.mo_person_modal')) {
                const getClassesList = e.target?.closest('.mo_person_modal').classList;
                if(currentOpenedModal === null) {
                    getClassesList.remove('active');
                }
            }
        }

    })
}

closeModal();