
var searchUsers = document.querySelector('#search-users'),
    users = document.querySelectorAll('.user'),
    usersData = document.querySelectorAll('.user-data'),
    searchVal;

searchUsers.addEventListener('keydown', function () {
    searchVal = this.value.toLowerCase();

    for (var i = 0; i < users.length; i++) {
        if (!searchVal || usersData[i].textContent.toLowerCase().indexOf(searchVal) > -1) {
            users[i].style['display'] = 'flex';
        }
        else {
            users[i].style['display'] = 'none';
        }
    }
});


