


$("#question-submit").click(function(e) 
{
      e.preventDefault();

    var submissionValue;
        //Get vals of inputs
      var savings = $('input[name="savings"]:checked').val();
      var bills = $('input[name="bills"]:checked').val();
      var food = $('input[name="food"]:checked').val();

     
    //If savings is just checked
      if(savings != 0 && bills != 0 && food != 0) //All inputs 700
      {
          submissionValue = 700;
          console.log('I selected all inputs, default please.');
      }

      
      if(savings == 0 && bills == 0 && food == 0 ) // No Inputs 0 
      {
          submissionValue = 0;
        console.log('I did not say yes to all inputs, default please.');
      }

      
      if(food != 0 && savings == 0 && bills == 0 ) //Just Food 200
      {
          submissionValue = 200;
          console.log('Food');
      }

      if(bills != 0 && food == 0 && savings == 0 ) //Just Bills 300
      {
          submissionValue = 300;
          console.log('Bills');
      }

      if(savings != 0 && food == 0 && bills == 0 ) //Just Savings 100
      {
          submissionValue = 100;
          console.log('Savings');
      }

      if(savings != 0 && food != 0 && bills == 0 ) //Food and Savings 400
      {
          submissionValue = 400;
          console.log('Food and Savings');
      }

      if(savings != 0 && bills != 0 && food == 0 ) //Bills and savings 500
      {
          submissionValue = 500;
          console.log('Bills and Savings');
      }

      if(food != 0 && bills != 0 && savings == 0 ) //Food and Bills 600
      {     
          submissionValue = 600;
          console.log('Food and Bills');
      }




    $.ajax({
        type: "POST",
        url: './submitQuestionaire.php',
        data:
        {
           'submissionValue' : submissionValue,
        },
   
        success: function(response)
        {

            //response = $.parseJSON(response); //get the response

            window.location.href = "./login.php?please=yes"; //Go back to the login page
        }  
    });  


});

     

    
