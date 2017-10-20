


function clearText()
{
    document.getElementById('amountInput').value = "";
}


$('.calcButton').click(function() 
{

    var amount = $('.amountInput').val();
    
    document.getElementsByClassName("amountInput").value = "";

    $.ajax({
        type: "POST",
        url: './addMoney.php',
        data:
        {
           'amount' : amount,
        },
   
        success: function(response)
        {

            response = $.parseJSON(response); //get the response
          
            location.reload();

            console.log(response);
        }  
    });   

    
    
});
