var f = document.createElement("form");
f.setAttribute('method',"post");
f.setAttribute('action',"submit.php");

//create input element
var i = document.createElement("input");
i.type = "text";
i.name = "user_name";
i.id = "user_name1";

//create a checkbox
var c = document.createElement("input");
c.type = "checkbox";
c.id = "checkbox1";
c.name = "check1";

//create a button
var s = document.createElement("input");
s.type = "submit";
s.value = "Submit";

// add all elements to the form
f.appendChild(i);
f.appendChild(c);
f.appendChild(s);

// add the form inside the body

document.getElementsByTagName('body')[0].appendChild(f); 