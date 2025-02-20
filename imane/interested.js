/*let InterestedButton = document.querySelector('#interest');
let MainNotifsDiv = document.querySelector('.notifs-content');

InterestedButton.addEventListener('click', (eventt) => {
    const newNotification = document.createElement('div');
    newNotification.textContent = 'A person is interested in your post, check it out!';
    const previousNotification = MainNotifsDiv.lastElementChild;
    if (previousNotification) {
        const previousClass = previousNotification.className;
        newNotification.className = previousClass;
    }
    MainNotifsDiv.appendChild(newNotification);
});*/

let InterestedButton = document.querySelector('#interest');
let MainNotifsDiv = document.querySelector('.notifs-content');

InterestedButton.addEventListener('click', (event) => {
    const newNotification = document.createElement('div');
    newNotification.textContent = 'A person is interested in your post, check it out!';
    newNotification.className = 'notif-element';
    newNotification.style.borderRadius = '3%';
    newNotification.style.border = 'solid';
    newNotification.style.borderColor = '#FFF6E0';
    newNotification.style.marginTop = '5px';
    newNotification.style.width = '300px';
    newNotification.style.marginBottom = '5px';
    newNotification.style.padding = '10px';
    newNotification.style.color = 'white';
    newNotification.style.fontSize = '18px';

    const firstNotification = MainNotifsDiv.firstElementChild.nextElementSibling;
    MainNotifsDiv.insertBefore(newNotification, firstNotification);
});
