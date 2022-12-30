const toDoList = []
function addToDoList(){
let valueInput = document.getElementById("valueInput").value
if(valueInput){
    toDoList.push(valueInput);
    document.getElementById("valueInput").value = ""
    renderToDoList()
}
}

function renderToDoList(){
let valueInput = ``
toDoList.map((value, index)=>{
    valueInput += `
        <div class="input-group">
            <input class="form-control" type="text" value="${value}" disabled="disabled">
            <div class="input-group-append">
                <span class="btn btn-primary" onclick="deleteList(${index})">Delete</span>
            </div>
        </div>`
})
document.getElementById("table").innerHTML = valueInput
}

function deleteList(index){
toDoList.splice(index, 1);
renderToDoList()
}

function submitValue(){
document.formCourse.benefits.value = toDoList;
document.getElementById("formCourse").submit();
}