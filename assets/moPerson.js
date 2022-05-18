// console.log("HIIIIII");
const items = document.querySelectorAll( '.person_frontend_container' );
const personsContents = document.querySelectorAll( '.person_container_content' );
const modals = document.querySelectorAll( '.modal' );

// console.log(items);
const moItems = [...items];
const personsArr = [...personsContents];
const modalsArr = [...modals];
// modalsArr.map(modal => {
//     jQuery(modal).addClass('hidden')
// })
// console.log('moItems', moItems);
// console.log("persons", personsArr);
// console.log("modals", modalsArr);

personsArr.map(person => {
    // console.log("person",person);
    person.addEventListener('click', (e) => {
        // console.log("Current Target", e.target);
        // console.log("Target value", e.target.closest('.person_frontend_container'));
        const currentModal = e.target.closest('.person_frontend_container')
        if(currentModal) {
            let theCurrentModal = currentModal.querySelector('.mo_person_modal');
            if(!theCurrentModal.classList.contains('active')) {
                theCurrentModal.classList.add('active');
            }

            // currentModal.addEventListener('click', function(event) {
            //     console.log("Modal Target event", event.target.closest('.modal-content'));
            //     if(event.target.closest('.modal-content') === null) {
            //         if(theCurrentModal.classList.contains('active')) {
            //             console.log("TRUE");
            //             theCurrentModal.classList.remove('active');
            //         }
            //     }
            // })
           
            // console.log("currentModal", currentModal);

        }
        // currentModal.style="display:block";

        // const activeModal = document.querySelector('.active');
        // console.log("activeModal",activeModal);
    })

    // function closeModal() {
        

    // }

    // closeModal();
})

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
    // modalsArr.map(modal => {
    //     console.log("modal",modal);
    // })
}

closeModal();