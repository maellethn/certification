$(document).ready(function () {
    $('.add_answer_link').on("click", function () {
        addFormToCollection();
    });
    $('#question_answers > div').each( function (index) {
        addTagFormDeleteLink($(this))
        }
    );
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
    console.log(answer[0]);
    answer.append(removeFormButton);

    removeFormButton.addEventListener('click', (e) => {
        e.preventDefault();
        // remove the li for the tag form
        answer.remove();
    });
}
