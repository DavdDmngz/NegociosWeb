document.addEventListener('DOMContentLoaded', function() {
    var inputFile = document.getElementById('inputGroupFile01');
    var fileLabel = document.querySelector('.custom-file-label');
    
    inputFile.addEventListener('change', function(event) {
        var fileName = event.target.files[0] ? event.target.files[0].name : 'Choose file';
        fileLabel.textContent = fileName;
    });
});