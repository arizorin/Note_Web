var notes;
var session;

function loadNotes(){
    $.ajax({
        url: '/Api/sessioninfo.php',
        success: function (response) {
            session = response;
            fetch(response)
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);

        }
    });
}

function fetch(session){
    $.ajax({
        url: '/Api/note/notes.php',
        data: {
            userID: session.userID
        },
        success: function (response) {
            var span = document.getElementById("counter");
            span.textContent = response.length;

             notes = response;
            for(i = 0; i < notes.length; i++){
                var div = document.createElement('div');
                div.className = "panel-body";
                div.innerHTML = "<button class='btn btn-light col-xs-11 text-left' onclick='showNote("+i+")'>"+notes[i].name+"" +
                    " <small id=\"emailHelp\" class=\"form-text text-muted\">"+notes[i].createDate+"</small></button> <a onclick='deleteNote("+notes[i].id+")'>❌</a>";
                document.getElementById('left').appendChild(div);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function showNote(id){
    document.getElementById("right").innerHTML = "";
    console.log(notes);
    var div = document.createElement('div');
    div.className = "panel-body";
    div.innerHTML = "<h4 id='noteName'>"+notes[id].name+"</h4>\n" +"<small id=\"emailHelp\" class=\"form-text text-muted\" ><div id='noteCreateDate'>"+notes[id].createDate+"</div></small>"+
        "<textarea cols=\"150\" rows=\"30\" id='noteText'>"+notes[id].text+"</textarea> <br><br><button class=\"btn btn-info\" onclick='saveNote("+notes[id].id+")'>Сохранить</button>";
    document.getElementById('right').appendChild(div);
}

function deleteNote(id){
    $.ajax({
        url: '/Api/note/deleteNote.php',
        data: {
            userID: session.userID,
            token: session.token,
            id: id
        },
        success: function (response) {
                window.location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function addNoteWindow(){
    var date = new Date();
    var div = document.createElement('div');
    document.getElementById("right").innerHTML = "";
    div.className = "panel-body";
    div.innerHTML = "<h4 id='noteName'>Новая заметка</h4>\n" +"<small id=\"emailHelp\" class=\"form-text text-muted\"><div id='noteCreateDate'>"+date.toDateString()+"</div></small>"+
        "<textarea oninput='setNoteName()' cols=\"150\" rows=\"30\" id='noteText'></textarea><br><br><button class=\"btn btn-info\" onclick='addNote()'>Создать заметку</button>";
    document.getElementById('right').appendChild(div);
}


function setNoteName(){
    var string = document.getElementById("noteText").value;
    var substring = string.slice(0,8);
    document.getElementById("noteName").innerText = substring;
}

function saveNote(id){
    $.ajax({
        url: '/Api/note/saveNote.php',
        data: {
            userID: session.userID,
            token: session.token,
            id: id,
            text: document.getElementById("noteText").value,
            name: document.getElementById("noteName").innerText,
            createDate: document.getElementById("noteCreateDate").innerText
        },
        success: function (response) {
            window.location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}


function addNote(){
    $.ajax({
        url: '/Api/note/addNote.php',
        data: {
            userID: session.userID,
            token: session.token,
            text: document.getElementById("noteText").value,
            name: document.getElementById("noteName").innerText,
            createDate: document.getElementById("noteCreateDate").innerText
        },
        success: function (response) {
            window.location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}