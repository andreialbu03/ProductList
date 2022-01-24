// 1 = delete
// 2 = insert
// 3 = edit/update
let operation = 0;


function displayData(tableRow) {

    var columns = tableRow.querySelectorAll("td");
    const col_name = ["prod_id", "quantity", "name", "description"];

    for(var i=0; i<columns.length-1; i++) {
        document.getElementById(col_name[i]).value = columns[i].innerHTML;
        //console.log('Column '+i+': '+columns[i].innerHTML );
    }

}


function deleteData() {

    operation = 1
    document.getElementById('operation').value = 1;
    document.getElementById('label-operation').innerHTML= 'Operation: Delete';

    const prod_id = document.querySelector('#prod_id');
    const quantity = document.querySelector('#quantity');
    const name = document.querySelector('#name');
    const description = document.querySelector('#description');

    const list = [quantity, name, description];

    for (i=0; i<list.length; i++) {
        if (!list[i].hasAttribute('readonly')) {
            list[i].setAttribute('readonly', 'readonly');
        }
    }

    prod_id.removeAttribute('readonly');

}


function insertData() {

    operation = 2
    document.getElementById('operation').value = 2;
    document.getElementById('label-operation').innerHTML= 'Operation: Insert';

    const quantity = document.querySelector('#quantity');
    const name = document.querySelector('#name');
    const description = document.querySelector('#description');

    const list = [quantity, name, description];

    for (i=0; i<list.length; i++) {
        if (list[i].hasAttribute('readonly')) {
            list[i].removeAttribute('readonly');
        }
    }

}


function updateData() {

    operation = 3;
    document.getElementById('operation').value = 3;
    document.getElementById('label-operation').innerHTML= 'Operation: Edit/Update';

    const quantity = document.querySelector('#quantity');
    const name = document.querySelector('#name');
    const description = document.querySelector('#description');

    const list = [quantity, name, description];

    for (i=0; i<list.length; i++) {
        if (list[i].hasAttribute('readonly')) {
            list[i].removeAttribute('readonly');
        }
    }

}


function commitData() {
    const col_name = [ "quantity", "name", "description"];

    if (operation == 1) {

        if (document.getElementById("prod_id").value.length == 0) {
            alert("Make sure you select a product or enter its ID!");
            return false;
        }

    } else {

        for(i=0; i<col_name.length; i++) {
            if (document.getElementById(col_name[i]).value.length == 0) {
                alert("Make sure fields are not empty!");
                return false;
            }
        }

    }

}