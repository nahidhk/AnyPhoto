function toggleContent() {
    var content = document.querySelector('.content');
    content.classList.toggle('expanded');
    var seeMore = document.querySelector('.see-more');
    seeMore.textContent = content.classList.contains('expanded') ? 'See Less' : 'See More';
}