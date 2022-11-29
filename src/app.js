const editor = document.querySelector("#editor");
const txtarea = document.querySelector("#txtarea");
const save = document.querySelector("#save");
const open = document.querySelector("#open");
const downloadBtn = document.querySelector("#download");
const loadBtn = document.querySelector("#load");
const copy = document.querySelector("#copy");

// Prevents the cursor from going to start
function saveCaretPosition(context){
  var selection = window.getSelection();
  var range = selection.getRangeAt(0);
  range.setStart(  context, 0 );
  var len = range.toString().length;

  return function restore(){
    var pos = getTextNodeAtPosition(context, len);
    selection.removeAllRanges();
    var range = new Range();
    range.setStart(pos.node ,pos.position);
    selection.addRange(range);
  }
}

function getTextNodeAtPosition(root, index){
  const NODE_TYPE = NodeFilter.SHOW_TEXT;
  var treeWalker = document.createTreeWalker(root, NODE_TYPE, function next(elem) {
    if(index > elem.textContent.length){
      index -= elem.textContent.length;
      return NodeFilter.FILTER_REJECT
    }
    return NodeFilter.FILTER_ACCEPT;
  });
  var c = treeWalker.nextNode();
  return {
    node: c? c: root,
    position: index
  };
}

// The syntax highlighter 
editor.addEventListener('input',function () {
  var restore = saveCaretPosition(this);
  Prism.highlightElement(this);
  restore();

  // Update hidden textarea with the code value
  txtarea.value = editor.textContent;
})

window.addEventListener('load',function () {
  txtarea.value = editor.textContent;
})

// Focus cursor on the editor
editor.focus();

// Save and Open
save.addEventListener('click',saveCode);
open.addEventListener('click',openCode);

function saveCode(){
  let name = prompt("Save as project", "Project name...");

  if(name == null){
    return;
  }
  if(name == "" || name == " " || name == "Project name..."){
    alert("Invalid project name in the input.");
    return;
  }
  if(name.length > 54){
    alert("Project name must be shorter than 54 characters.");
    return;
  }

  localStorage.setItem(`project_${name}`, editor.textContent);
}

function openCode(){
  let name = prompt("Open a project", "Project name...");

  if(name == null){
    return;
  }
  if(name == "" || name == " " || name == "Project name..."){
    alert("Invalid project name in the input.");
    return;
  }
  if(name.length > 54){
    alert("Project name must be shorter than 54 characters.");
    return;
  }
  if(localStorage.getItem(`project_${name}`) == null){
    alert(`Project with name ${name} doesn't exist.`);
    return;
  }

  let code = localStorage.getItem(`project_${name}`);
  editor.textContent = code;
  txtarea.value = code;
  
  var restore = saveCaretPosition(editor);
  Prism.highlightElement(editor);
  restore();
}

// Download with FileSaver.js
downloadBtn.addEventListener('click',download);
function download(){
  var text = editor.textContent;

  var blob = new Blob([text], {type: "charset=utf-8"});
  saveAs(blob, "fiddleit.php");
}

// Load popup
const popupScreen = document.querySelector(".popup-screen");
const popupBox = document.querySelector(".popup-box");
const popupClose = document.querySelector(".popup-close");

loadBtn.addEventListener('click',load);
function load(){
  popupScreen.classList.add("active");
}
popupClose.addEventListener('click', () => {
  popupScreen.classList.remove("active");
})

// Load file
document.querySelector('#input-load').addEventListener('change',getFile);

function getFile(event){
	const input = event.target
  if ('files' in input && input.files.length > 0){
	  placeFileContent(
      editor,
      txtarea,
      input.files[0])
  }
}

function placeFileContent(target, target2, file){
	readFileContent(file).then(content => {
  	target.textContent = content
    target2.value = content
    var restore = saveCaretPosition(editor);
    Prism.highlightElement(editor);
    restore();

    popupScreen.classList.remove("active");
  }).catch(error => console.log(error))
}

function readFileContent(file){
	const reader = new FileReader()
  return new Promise((resolve, reject) => {
    reader.onload = event => resolve(event.target.result)
    reader.onerror = error => reject(error)
    reader.readAsText(file)
  })
}

// Copy code to clipboard
copy.addEventListener('click',copyCode);

function copyCode(){
  navigator.clipboard.writeText(editor.textContent);
  alert("Copied to clipboard");
}