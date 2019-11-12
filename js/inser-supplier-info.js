var lineIterator = 0;

function insertSupplierRow(id, ID, contactNumber, address )
{
    var element = document.getElementById(id);
    var newElement = '<div id="supplierRow-' + lineIterator++ + '" class="row">' +
    	'<div class="dev col-1 offset-2">' + ID + '</div>' + 
        '<div class="dev col-2 ">' + contactNumber + '</div>' + 
        '<div class="dev col-3 ">' + address + '</div>' +
        '</div>'
    element.insertAdjacentHTML( 'afterend', newElement )
    console.log("OK")   
}