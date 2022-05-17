
const items = document.querySelectorAll( '.person_container_content' );

const moPersons = [...items];

// console.log('moPersons', moPersons);

moPersons.map(person => {
    console.log("person",person);
})