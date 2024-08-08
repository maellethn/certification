document
    .querySelectorAll('.add_answer_link')
    .forEach(btn => {
        btn.addEventListener("click", addFormToCollection)
    });

function addFormToCollection(e) {

    const collectionHolder = document.querySelector('#question_answers');

    const item = document.createElement('li');

    item.innerHTML = collectionHolder
        .dataset
        .prototype
        .replace(
            /__name__/g,
            collectionHolder.dataset.index
        );

    collectionHolder.appendChild(item);

    collectionHolder.dataset.index++;

    addTagFormDeleteLink(item)


}

function addTagFormDeleteLink(item) {
    const removeFormButton = document.createElement('button');
    removeFormButton.innerText = 'Delete this tag';
    removeFormButton.className = 'btn btn-primary';

    item.append(removeFormButton);

    removeFormButton.addEventListener('click', (e) => {
        e.preventDefault();
        // remove the li for the tag form
        item.remove();
    });
}
document
    .querySelectorAll('.question_answers li')
    .forEach((tag) => {
        addTagFormDeleteLink(tag)
    })