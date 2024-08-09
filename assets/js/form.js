document
    .querySelectorAll('.add_answer_link')
    .forEach(btn => {
        btn.addEventListener("click", addFormToCollection)
    });

function addFormToCollection(e) {

    const collectionHolder = document.querySelector('#question_answers');

    const answer = document.createElement('div');

    answer.innerHTML = collectionHolder
        .dataset
        .prototype
        .replace(
            /__name__/g,
            collectionHolder.dataset.index
        );

    collectionHolder.appendChild(answer);

    collectionHolder.dataset.index++;

    addTagFormDeleteLink(answer)


}

function addTagFormDeleteLink(answer) {
    const removeFormButton = document.createElement('button');
    removeFormButton.innerText = 'Delete';
    removeFormButton.className = 'btn btn-primary';

    answer.append(removeFormButton);

    removeFormButton.addEventListener('click', (e) => {
        e.preventDefault();
        // remove the li for the tag form
        answer.remove();
    });
}
document
    .querySelectorAll('#question_answers > div')
    .forEach((tag) => {
        addTagFormDeleteLink(tag)
    })