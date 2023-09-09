const myButton = document.querySelector('#btn-comments');
console.log(myButton);

const commentaires = document.querySelector('#com');
console.log(commentaires);


function voirComments() {

    if (commentaires.style.display == 'none') {

        commentaires.style.display = 'block';

    } else {
        commentaires.style.display = 'none';
    }

}