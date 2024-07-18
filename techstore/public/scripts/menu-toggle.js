document.getElementById('cat-heading').addEventListener('click', function() {
    var menu = document.getElementById('main-category');
    if (menu.style.display === 'none' || menu.style.display === '') {
        menu.style.display = 'block';
    } else {
        menu.style.display = 'none';
    }
});

document.querySelectorAll('.toggle-sub-category').forEach(function(element) {
    element.addEventListener('click', function(event) {
        event.preventDefault();
        var subCategory = this.nextElementSibling;
        if (subCategory.style.display === 'none' || subCategory.style.display === '') {
            subCategory.style.display = 'block';
        } else {
            subCategory.style.display = 'none';
        }
    });
});

document.querySelectorAll('.toggle-mega-menu').forEach(function(element) {
    element.addEventListener('click', function(event) {
        event.preventDefault();
        var megaMenu = this.nextElementSibling;
        if (megaMenu.style.display === 'none' || megaMenu.style.display === '') {
            megaMenu.style.display = 'block';
        } else {
            megaMenu.style.display = 'none';
        }
    });
});

$(document).ready(function(){
	// Toggle sub-category
	$(".toggle-sub-category").click(function(){
		$(this).next(".sub-category").slideToggle();
	});
	// Toggle mega-menu
	$(".toggle-mega-menu").click(function(){
		$(this).next(".mega-menu").slideToggle();
	});
});
