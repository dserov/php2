'use strict';

let scrollCheck = document.querySelector('.scrollCheck');
let autoLoadEnableElement = document.querySelector('#autoload-logs');


autoLoadEnableElement.addEventListener('change', function () {
    if (this.checked) {
        getMoreLogs();
    }
});

document.addEventListener('DOMContentLoaded', loaded);

function loaded() {
    document.querySelector('.get-more-logs').addEventListener('click', getMoreLogs);
    init();
}

function init() {
    if (window.innerHeight === document.body.offsetHeight) {
        getMoreLogs();
        init();
    }
}

document.addEventListener('scroll', function(event) {
    if (scrollCheck.getBoundingClientRect().top <= window.innerHeight) {
        let isAutoLoadEnable = autoLoadEnableElement.checked;
        if (isAutoLoadEnable) {
            getMoreLogs();
        }
    }
});

function getMoreLogs() {
    let entriesCount = document.querySelectorAll('.log-details').length;
    let request = fetch(`ajax.php?from=${entriesCount - 1}`).then( (res) => res.json() );
    request.then((data) => {
        document.querySelector('#log-container').insertAdjacentHTML('beforeend', data.html);
    });
}
