var toDoList = [];

function addToDoList() {
    let valueInput = document.getElementById("valueInput").value;
    if (valueInput) {
        toDoList.push(valueInput);
        document.getElementById("valueInput").value = "";
        renderToDoList(toDoList);
        document.formCourse.benefits.value = toDoList;
    }
}

function renderToDoList(toDoList) {
    var valueInput = ``;
    toDoList.map((value, index)=>{
        valueInput += `
            <div class="input-group">
                <input name="addValue" id="addValue" class="form-control addValue" type="text" value="${value}" disabled="disabled">
                <div class="input-group-append">
                    <span class="btn btn-primary" onclick="deleteList(${index})">Delete</span>
                </div>
            </div>`
    })
    document.getElementById("table").innerHTML = valueInput;
}

function deleteList(index) {
    toDoList.splice(index, 1);
    renderToDoList(toDoList);
    document.formCourse.benefits.value = toDoList;
}

window.onload = function() 
{   
    var oldValue = document.getElementById("benefits").value;
    toDoList = [];
    toDoList = JSON.parse(oldValue)
    document.getElementById("benefits").value = toDoList
    renderToDoList(toDoList);
};