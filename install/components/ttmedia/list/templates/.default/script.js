document.addEventListener('DOMContentLoaded', function () {
    const sortElements = document.querySelectorAll('.sort');
    const pageElements = document.querySelectorAll('.page');
    const url = new URL(window.location.href);

    for (let element of sortElements) {
        element.addEventListener('click', function () {
            url.searchParams.set('sort', element.dataset.sort);
            url.searchParams.set('order', element.dataset.order);
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