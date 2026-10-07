function pesan() {
	window.alert("pesan ");
}

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
} 

function myList() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
function myListTable(col) {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  table = document.getElementById("idTable");
  tr = table.getElementsByTagName('tr');
  //alert('Key up');
  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[col];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

var formfield = document.getElementById('formfield');

function add(){
  var newField = document.createElement('input');
  newField.setAttribute('type','text');
  newField.setAttribute('name','opt_text');
  newField.setAttribute('class','text');
  newField.setAttribute('siz',50);
  newField.setAttribute('placeholder','input option here ...');
  formfield.appendChild(newField);
}

function remove(){
  var input_tags = formfield.getElementsByTagName('input');
  if(input_tags.length > 2) {
    formfield.removeChild(input_tags[(input_tags.length) - 1]);
  }
}

function saveAns(ansid,quizid,ans,titleid) {
	let formData = new FormData();
	formData.append('table','quiz_ans');
	if(ansid>0) formData.append('ans_id',ansid);
	formData.append('quiz_id',quizid);
	formData.append('ans',ans);
	if(quizid != ''){
		//alert('saveAns ');
		//alert(formData.get('ans'));
		//alert('ans_id '+ansid+' quiz_id= '+quizid+' ans='+ans);
		$.ajax({
			url: '?class=cQuiz/save',
			method: 'post',
			data: {table:'quiz_ans', title_id:titleid, ans_id:ansid, quiz_id:quizid, ans:ans},
			success: function(response) {
				//alert(response);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert(textStatus);
			},
			complete: function(){
				//alert('Finish!');
			}
		});
		//alert('saveAns ');
	}
}

function saveAnswer(ansid,quizid,userid,optid,titleid){
	var weHaveSuccess = false;
	let formData = new FormData();
	formData.append('table','quiz_answer');
	if(ansid>0) formData.append('ans_id',ansid);
	formData.append('quiz_id',quizid);
	formData.append('ans',optid);
	formData.append('user_id',userid);
	formData.append('title_id',titleid);
	if(quizid != '' && optid != '' && userid != ''){
		//alert('Mulai, mulai');
		$.ajax({
			url: '?class=Quiz/simpan',
			type: 'post',
			//data: {table:'quiz_answer',ans_id:ansid,quiz_id:quizid,ans:optid,user_id:userid},
			data: formData,
			processData: false,
			contentType: false,
			success: function(response){
				//alert(response);
				weHaveSuccess = true;
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert(textStatus);
			},
			complete: function(){
				if(!weHaveSuccess){
					alert('Something wrong on server side!');
				}// else alert('Success bro');
			}
		});
	} 
}

function saveOpt(optid,quizid) {
	var opttext = document.getElementById(optid).value;
	let formData = new FormData();
	formData.append('table','quiz_option');
	formData.append('opt_id',optid);
	formData.append('quiz_id',quizid);
	formData.append('opt_text',opttext);
	//alert(optid+"="+opttext);
	$.ajax({
		url: '?class=cQuiz/save',
		type: 'post',
		data: formData,
		processData: false,
		contentType: false,
		success: function(response){
			//alert(response);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert(textStatus);
		},
		complete: function(){
			alert('Selesai bro');
		}
	});
}
