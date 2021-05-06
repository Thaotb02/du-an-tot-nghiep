var searchPost = document.querySelector('#search-post'),
    post = document.querySelectorAll('.post'),
    postData = document.querySelectorAll('.post-data'),
    search;
searchPost.addEventListener('keydown', function () {
    search = this.value.toLowerCase();
    for (var i = 0; i < post.length; i++) {
        if (!search || postData[i].textContent.toLowerCase().indexOf(search) > -1) {
            post[i].style['display'] = 'flex';
        } else {
            post[i].style['display'] = 'none';
        }
    }
});
