var lineIterator = 0;

function insertRequestRow(id, branch, partID, description, quantity)
{
    var element = document.getElementById(id);
    var newElement = '<div id="partRow-' + lineIterator++ + '" class="row">' + 
        '<div class="dev col-1 offset-2">' + branch + '</div>' + 
        '<div class="dev col-1">' + partID + '</div>' +
        '<div class="dev col-4">' + description + '</div>' +
        '<div class="dev col-1">' + quantity + '</div>' +
        '</div>'
    element.insertAdjacentHTML( 'afterend', newElement )
    console.log("OK")   
}