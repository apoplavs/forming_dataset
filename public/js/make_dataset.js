var doc_categories = [];
var last_doc = {};

// підвищення читабельності документу
function refactorDoc(text) {

    text = text.replace(/УХВАЛИ(\W+):/, "<b>УХВАЛИ$1:</b>");
    text = text.replace(/ВИРІШИ(\W+):/, "<b>ВИРІШИ$1:</b>");
    text = text.replace(/ПОСТАНОВИ(\W+):/, "<b>ПОСТАНОВИ$1:</b>");
    text = text.replace(/ЗАСУДИ(\W+):/, "<b>ЗАСУДИ$1:</b>");
    text = text.replace(/ВСТАНОВИ(\W+):/, "<b>ВСТАНОВИ$1:</b>");

    text = text.replace(/ВИРОК/, "&nbsp; &nbsp; &nbsp; <b>ВИРОК</b>");
    text = text.replace(/УХВАЛА/, "&nbsp; &nbsp; &nbsp; <b>УХВАЛА</b>");
    text = text.replace(/ПОСТАНОВА/, "&nbsp; &nbsp; &nbsp; <b>ПОСТАНОВА</b>");
    text = text.replace(/РІШЕННЯ/, "&nbsp; &nbsp; &nbsp; <b>РІШЕННЯ</b>");

    text = text.replace(/\n/g, "</br> ");
    return text;
}

// надсилає один документ з датасету на сервер
function pushDoc() {
    if (doc_categories.length > 0) {
        doc_to_push = doc_categories.shift();
        $.post('set-doctype', doc_to_push, function (data) {
        });
    }
}


// присвоює категорію для певного документу
function setCategory(category) {
    doc_id = document.getElementById('doc-id').innerHTML;
	doc_categories.push({doc_id: doc_id, category: category});

	// якщо в стеку більше 1 документа, запушити на сервр
	if (doc_categories.length > 1) {
	    pushDoc();
    }
	nextDoc();
}

// повернення до попереднього документу
function previousDoc() {
    // отрмуємо останній документ з масиву
    last_doc_in_arr = doc_categories.pop();

    // якщо попередньому документу не була присвоєна категорія - повертаємо його назад в масив
    if (last_doc_in_arr && last_doc_in_arr.doc_id != last_doc.doc_id) {
        doc_categories.push(last_doc_in_arr);
    }
    document.getElementById('doc-id').innerHTML = last_doc.doc_id;
    document.getElementById('doc-text').innerHTML = last_doc.doc_text;
    document.getElementById('previous-doc').disabled = true;
}


// перехід до наступного документу
function nextDoc() {
    // якщо це не перший документ записуємо його в стек
    if (document.getElementById('doc-id').innerHTML.length > 1) {
        last_doc.doc_id = document.getElementById('doc-id').innerHTML;
        last_doc.doc_text = document.getElementById('doc-text').innerHTML;

    }

    // якщо це перший документ - відключити кнопку назад
	document.getElementById('previous-doc').disabled = last_doc.doc_id === undefined;

	// якщо закінчився датасет - обновити сторінку і завантажити новий
	if (documents.length == 0) {
		pushDoc();
		location.reload();
        return;
	}

	current_doc = documents.pop();
	current_text = refactorDoc(current_doc['doc_text']);
	document.getElementById('doc-id').innerHTML = current_doc['doc_id'];
    document.getElementById('doc-text').innerHTML = current_text;
    $("html, body").animate({ scrollTop: $('body').height() - 800 }, 1000);
}


// зупиняє визначення датасету і надсилає датасет на сервер
function stopFormDataset() {
    home_url = window.location.origin + '/home';
    pushDoc();
    location.replace(home_url);
}


$(document).ready(function () {
    // додавання кнопок вибору
    buttons.forEach(function(button) {
        $('#choose-buttons').append('<button class="btn btn-primary" onclick="setCategory('+button.val+')">'+button.name+'</button>');
    });
    // вивід першого документу
	nextDoc();
});


