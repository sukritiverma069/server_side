// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


fetch("http://localhost/static_data/db_response.json")
  .then(response =>    response.json())
  .then( data => {
      console.log(Object.keys(data.database_response[0]));

      var title = document.getElementsByClassName("headers")[0];

    

    function listItem(array){
        for (var i = 0; i < array.length; i++){
          var list = array[i];

          list = document.createElement('div');
          var text = document.createTextNode(array[i]);
          list.appendChild(text);

          document.getElementsByClassName("headers")[0].appendChild(list);

        console.log(list);
        }  
       }
       
       listItem(Object.keys(data.database_response[0]));

    //    function myFunction(array){
    //     for (var i = 0; i < array.length; i++){

    //         var first = document.createElement("input");
    //     var text = document.createTextNode("input");
    //     first.appendChild(text);
        
    //     document.getElementsByClassName("inputs")[0].appendChild(first);

    //     }
  
        
        
    //     }

    //     myFunction(Object.keys(data.database_response[0]));

         
    
    

     
      
      
   })

  .catch(error => {
      console.log(error);
  });



