document.addEventListener('DOMContentLoaded', function () {
    const sortElements = document.querySelectorAll('.sort');
    const pageElements = document.querySelectorAll('.page');
    const url = new URL(window.location.href);

    for (let element of sortElements) {
        console.log(element)
        element.addEventListener('click', function () {
            url.searchParams.set('sort', element.dataset.sort);
            window.location.href = url.toString();
        })
    }

    for (let page of pageElements) {
        page.addEventListener('click', function () {
            url.searchParams.set('page', page.dataset.page)
            window.location.href = url.toString();
        })
    }
});