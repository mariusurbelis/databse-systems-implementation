var lineIterator = 0;

function insertBranchRow(id, branchID, address)
{
    var element = document.getElementById(id);
    var newElement = '<div id="branchRow-' + lineIterator++ + '" class="row">' +
    	'<div class="dev col-1 offset-2">' + branchID + '</div>' + 
        '<div class="dev col-2 offset-1">' + address+ '</div>' + 
        '</div>'
    element.insertAdjacentHTML( 'afterend', newElement )
    console.log("OK")   
}