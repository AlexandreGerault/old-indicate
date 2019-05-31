let deleteButtons = document.querySelectorAll('button[data-action="delete"]');
let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Requested-With": "XMLHttpRequest",
    "X-CSRF-TOKEN": token
};

deleteButtons.forEach(function (elt) {
    elt.addEventListener('click', function() {
        let newsID = elt.dataset.id;
        let card = elt.parentElement.parentElement;

        if (window.fetch) {
            fetch('/news/delete/' + newsID, {
                headers,
                method: 'delete',
            }).then((response) => {
                console.log(response);
            }).then((response) => {
                elt.parentElement.parentElement.parentElement.removeChild(card);
            }).catch(function (error) {
                console.log(error);
            });
        }
    })
});